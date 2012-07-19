<?php

Class Controller_Admin_Photo Extends Controller_Admin_Base
{
	public $recordPerPage = 20;
	
	public function indexAction()
	{
		$error 			= array();
		$success 		= array();
		$warning 		= array();
		$formData 		= array('fbulkid' => array());
		
		$_SESSION['securityToken'] = Helper::getSecurityToken();  //for delete link
		$page 			= (int)($this->registry->router->getArg('page'))>0?(int)($this->registry->router->getArg('page')):1;
		
		$idFilter 		= (int)($this->registry->router->getArg('id'));
		$categoryFilter	= (int)$this->registry->router->getArg('category');
		$keywordFilter 	= $this->registry->router->getArg('keyword'); 
		$searchKeywordIn= $this->registry->router->getArg('searchin');  
		
		//check sort column condition
		$sortby 	= $this->registry->router->getArg('sortby');
		if($sortby == '') $sortby = 'id';
		$formData['sortby'] = $sortby;
		$sorttype 	= $this->registry->router->getArg('sorttype');
		if(strtoupper($sorttype) != 'ASC') $sorttype = 'DESC';
		$formData['sorttype'] = $sorttype;	
		
		
		if(!empty($_POST['fsubmitbulk']))
		{
			if(!isset($_POST['fbulkid']))
			{
				$warning[] = $this->registry->lang['default']['bulkItemNoSelected'];
			}
			else
			{
				$formData['fbulkid'] = $_POST['fbulkid'];
				
				//check for delete 
				if($_POST['fbulkaction'] == 'delete')
				{
					$delArr = $_POST['fbulkid'];
					$deletedItems = array();
					$cannotDeletedItems = array();
					foreach($delArr as $id)
					{
						//check valid user and not admin user
						$myPhoto = new Core_Photo($id);
						
						if($myPhoto->id > 0)
						{
							//tien hanh xoa
							if($myPhoto->delete())
							{
								$deletedItems[] = $myPhoto->title;
								$this->registry->me->writelog('photo_delete', $myPhoto->id, array('title' => $myPhoto->title));  	
							}
							else
								$cannotDeletedItems[] = $myPhoto->title;
						}
						else
							$cannotDeletedItems[] = $myPhoto->title;
					}
					
					if(count($deletedItems) > 0)
						$success[] = str_replace('###title###', implode(', ', $deletedItems), $this->registry->lang['controller']['succDelete']);
					
					if(count($cannotDeletedItems) > 0)
						$error[] = str_replace('###title###', implode(', ', $cannotDeletedItems), $this->registry->lang['controller']['errDelete']);
				}
				else
				{
					//bulk action not select, show error
					$warning[] = $this->registry->lang['default']['bulkActionInvalidWarn'];
				}
			}
		}
		
				
		$paginateUrl = $this->registry->conf['rooturl_admin'].'photo/index/';      
		
		if($idFilter > 0)
		{
			$paginateUrl .= 'id/'.$idFilter . '/';
			$formData['fid'] = $idFilter;
			$formData['search'] = 'id';
		}
		
		if($categoryFilter > 0)
		{
			$paginateUrl .= 'categoryFilter/'.$categoryFilter . '/';
			$formData['fcategory'] = $categoryFilter;
			$formData['search'] = 'category';
		}
		
		
		if(strlen($keywordFilter) > 0)
		{
			
			$paginateUrl .= 'keyword/' . $keywordFilter . '/';
			
			if($searchKeywordIn == 'title')
			{
				$paginateUrl .= 'searchin/title/';
			}
			elseif($searchKeywordIn == 'description')
			{
				$paginateUrl .= 'searchin/description/';
			}
			$formData['fkeyword'] = $formData['fkeywordFilter'] = $keywordFilter;
			$formData['fsearchin'] = $formData['fsearchKeywordIn'] = $searchKeywordIn;
			$formData['search'] = 'keyword';
		}
		
		//tim tong so
		$total = Core_Photo::getPhotos($formData, $sortby, $sorttype, 0, true);    
		$totalPage = ceil($total/$this->recordPerPage);
		$curPage = $page;
		
			
		//get latest account
		$photos = Core_Photo::getPhotos($formData, $sortby, $sorttype, (($page - 1)*$this->recordPerPage).','.$this->recordPerPage, false, true);
		
		for($i = 0; $i < count($photos); $i++)
		{
			$photos[$i]->category = new Core_PhotoCategory($photos[$i]->pcid);
		}
		
		//filter for sortby & sorttype
		$filterUrl = $paginateUrl;
		
		//append sort to paginate url
		$paginateUrl .= 'sortby/' . $sortby . '/sorttype/' . $sorttype . '/';
		
		//build redirect string
		$redirectUrl = $paginateUrl;
		if($curPage > 1)
			$redirectUrl .= 'page/' . $curPage;
			
		
		$redirectUrl = base64_encode($redirectUrl);
		
				
		$this->registry->smarty->assign(array(	'photos' 		=> $photos,
												'formData'		=> $formData,
												'success'		=> $success,
												'error'			=> $error,
												'warning'		=> $warning,
												'filterUrl'		=> $filterUrl,
												'paginateurl' 	=> $paginateUrl, 
												'redirectUrl'	=> $redirectUrl,
												'total'			=> $total,
												'totalPage' 	=> $totalPage,
												'curPage'		=> $curPage,
												));
		
		$contents = $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'index.tpl');
		
		$this->registry->smarty->assign(array(	'pageTitle'	=> $this->registry->lang['controller']['pageTitle_list'],
												'contents' 	=> $contents));
		
		$this->registry->smarty->display($this->registry->smartyControllerGroupContainer . 'index.tpl');
	}
	
	
	public function deleteAction()
	{
		$id = (int)$this->registry->router->getArg('id');
		$myPhoto = new Core_Photo($id);
		
			
		if($myPhoto->id > 0)
		{
			if(Helper::checkSecurityToken())
			{
				//tien hanh xoa
				if($myPhoto->delete())
				{
					$redirectMsg = $this->registry->lang['controller']['succDelete'];
					
					$this->registry->me->writelog('photo_delete', $myPhoto->id, array('title' => $myPhoto->title));
				}
				else
				{
					$redirectMsg = $this->registry->lang['controller']['errDelete'];
				}
			}
			else
				$redirectMsg = $this->registry->lang['default']['errFormTokenInvalid'];   
			
			
		}
		else
		{
			$redirectMsg = $this->registry->lang['controller']['errNotFound'];
		}
		
		$this->registry->smarty->assign(array('redirect' => $this->getRedirectUrl(),
												'redirectMsg' => $redirectMsg,
												));
		$this->registry->smarty->display('redirect.tpl');
	}
	
	function addAction()
    {
        $error     = array();
        $success     = array();
        $contents     = '';
        $formData     = array();
        
        if(!empty($_POST['fsubmit']))
        {                     
			if($_SESSION['photoAddToken'] == $_POST['ftoken'])
			{
				$formData = array_merge($formData, $_POST);
				
				if($this->addActionValidator($formData, $error))
				{
					$myPhoto = new Core_Photo();
					$myPhoto->uid = $this->registry->me->id;
					$myPhoto->pcid = $formData['fcategory'];
					$myPhoto->title = $formData['ftitle'];
					$myPhoto->description = $formData['fdescription'];
					$myPhoto->enable = $formData['fenable'];
					
					if($myPhoto->addData() > 0)
					{
						$success[] = $this->registry->lang['controller']['succAdd'];
						$this->registry->me->writelog('photo_add', $myPhoto->id, array('title' => $myPhoto->title));
						$formData = array('fcategory' => $formData['fcategory']);      
					}
					else
					{
						$error[] = $this->registry->lang['controller']['errAdd'];    
					}
				}
			}
        }
        
        $_SESSION['photoAddToken'] = Helper::getSecurityToken();  
        
        
        $this->registry->smarty->assign(array(  'formData'         => $formData,
                                                'redirectUrl'    => $this->getRedirectUrl(),
                                                'categoryList' => Core_PhotoCategory::getFullCategories(0, 0, '', array()),
                                                'error'            => $error,
                                                'success'        => $success,
                                                
                                                ));
        $contents = $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'add.tpl');
        
        $this->registry->smarty->assign(array(    'pageTitle'    => $this->registry->lang['controller']['pageTitle_add'],
                                                'contents'     => $contents));
        
        $this->registry->smarty->display($this->registry->smartyControllerGroupContainer . 'index.tpl');
    }
    
    function editAction()
    {                         
        $id = (int)$this->registry->router->getArg('id');
        $myPhoto = new Core_photo($id);
        $redirectUrl = $this->getRedirectUrl();
        if($myPhoto->id > 0)
        {
            $error         = array();
	        $success     = array();
	        $contents     = '';
	        $formData     = array();
	        
	        $formData['fcategory'] = $myPhoto->pcid;
	        $formData['ftitle'] = $myPhoto->title;
	        $formData['fdescription'] = $myPhoto->description;
	        $formData['fenable'] = $myPhoto->enable;
			$formData['fcountcomment'] = $myPhoto->countcomment;
	        $formData['ffilepath'] = $myPhoto->filepath;
	        
	        if(!empty($_POST['fsubmit']))
	        {
	            if($_SESSION['photoEditToken'] == $_POST['ftoken'])
	            {
	                $formData = array_merge($formData, $_POST);
	                
	                
	                if($this->editActionValidator($formData, $error))
	                {
                       	$myPhoto->pcid = $formData['fcategory'];
						$myPhoto->title = $formData['ftitle'];
						$myPhoto->description = $formData['fdescription'];
						$myPhoto->enable = $formData['fenable'];
						$myPhoto->countcomment = $formData['fcountcomment'];
						
						if($myPhoto->updateData(true))
	                    {
	                       $success[] = $this->registry->lang['controller']['succEdit'];
	                       $this->registry->me->writelog('photo_edit', $myPhoto->id, array('title' => $myPhoto->title));
	                    }                       
	                    else
	                    {
	                        $error[] = $this->registry->lang['controller']['errEdit'];    
	                    }
	                }
	            }
	            else
	            {
	            	$error[] = 'Unknown Error';
				}
	        }
	        $_SESSION['photoEditToken'] = Helper::getSecurityToken();//Tao token moi  
	        $this->registry->smarty->assign(array(   'formData'     => $formData, 
            										'myPhoto'	=> $myPhoto,
	                                                'redirectUrl'=> $redirectUrl,
	                                                'encoderedirectUrl'=> base64_encode($redirectUrl),
	                                                'categoryList' => Core_PhotoCategory::getFullCategories(0, 0, '', array()),
	                                                'error'        => $error,
	                                                'success'    => $success,
	                                                
	                                                ));
	        $contents .= $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'edit.tpl');
	        $this->registry->smarty->assign(array(
	                                                'pageTitle'    => $this->registry->lang['controller']['pageTitle_edit'],
	                                                'contents'             => $contents));
	        $this->registry->smarty->display($this->registry->smartyControllerGroupContainer . 'index.tpl');
            
        }
        else
        {
            $redirectMsg = $this->registry->lang['controller']['errNotFound'];
            $this->registry->smarty->assign(array('redirect' => $redirectUrl,
                                                    'redirectMsg' => $redirectMsg,
                                                    ));
            $this->registry->smarty->display('redirect.tpl');
        }
    } 

    
	####################################################################################################
	####################################################################################################
	####################################################################################################
	
	
	private function addActionValidator($formData, &$error)
    {
        $pass = true;
        
        if($formData['ftitle'] == '')
        {
        	$error[] = $this->registry->lang['controller']['errTitleRequired'];
            $pass = false;
		}
		
		if(empty($_FILES['fimage']['name']))
		{
			$error[] = $this->registry->lang['controller']['errFileRequired'];
			$pass = false;
		}
		else
		{
			//check extension
			$ext = strtoupper(Helper::fileExtension($_FILES['fimage']['name']));
			if(!in_array($ext, $this->registry->setting['photo']['validExtension']))
			{
				$error[] = $this->registry->lang['controller']['errFileTypeNotValid'];
				$pass = false;
			}
			
			if($_FILES['fimage']['size'] > $this->registry->setting['photo']['validMaxFileSize'])
			{
				$error[] = $this->registry->lang['controller']['errFileSizeNotValid'];
				$pass = false;
			}
			
			//check max size
		}
        
        return $pass;
    }

    private function editActionValidator($formData, &$error)
    {
        $pass = true;
      
      	if($formData['ftitle'] == '')
        {
        	$error[] = $this->registry->lang['controller']['errTitleRequired'];
            $pass = false;
		}
		
                
        return $pass;
    }
    
    
	
}
