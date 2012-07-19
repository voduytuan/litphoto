<?php

Class Controller_Admin_PhotoComment Extends Controller_Admin_Base
{
	public $recordPerPage = 40;
	
	public function indexAction()
	{
		$error 			= array();
		$success 		= array();
		$warning 		= array();
		$formData 		= array('fbulkid' => array());
		
		$_SESSION['securityToken'] = Helper::getSecurityToken();  //for delete link
		$page 			= (int)($this->registry->router->getArg('page'))>0?(int)($this->registry->router->getArg('page')):1;
		
		$idFilter 		= (int)($this->registry->router->getArg('id'));
		$photoIdFilter 		= (int)($this->registry->router->getArg('photoid'));
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
						$myPhotoComment = new Core_PhotoComment($id);
						
						if($myPhotoComment->id > 0)
						{
							//tien hanh xoa
							if($myPhotoComment->delete())
							{
								$deletedItems[] = $myPhotoComment->id;
								$this->registry->me->writelog('photocomment_delete', $myPhotoComment->id, array('text' => substr(strip_tags($myPhotoComment->text), 100), 'photoid' => $myPhotoComment->pid));
							}
							else
								$cannotDeletedItems[] = $myPhotoComment->id;
						}
						else
							$cannotDeletedItems[] = $myPhotoComment->id;
					}
					
					if(count($deletedItems) > 0)
						$success[] = str_replace('###id###', implode(', ', $deletedItems), $this->registry->lang['controller']['succDelete']);
					
					if(count($cannotDeletedItems) > 0)
						$error[] = str_replace('###id###', implode(', ', $cannotDeletedItems), $this->registry->lang['controller']['errDelete']);
				}
				else
				{
					//bulk action not select, show error
					$warning[] = $this->registry->lang['default']['bulkActionInvalidWarn'];
				}
			}
		}
		
				
		$paginateUrl = $this->registry->conf['rooturl_admin'].'photocomment/index/';      
		
		if($idFilter > 0)
		{
			$paginateUrl .= 'id/'.$idFilter . '/';
			$formData['fid'] = $idFilter;
			$formData['search'] = 'id';
		}
		
		if($photoIdFilter > 0)
		{
			$paginateUrl .= 'photoid/'.$photoIdFilter . '/';
			$formData['fphotoid'] = $photoIdFilter;
			$formData['search'] = 'photoid';
		}
		
		
		
		
		if(strlen($keywordFilter) > 0)
		{
			
			$paginateUrl .= 'keyword/' . $keywordFilter . '/';
			$paginateUrl .= 'searchin/'.$searchKeywordIn.'/';
			
			$formData['fkeyword'] = $formData['fkeywordFilter'] = $keywordFilter;
			$formData['fsearchin'] = $formData['fsearchKeywordIn'] = $searchKeywordIn;
			$formData['search'] = 'keyword';
		}
		
		//tim tong so
		$total = Core_PhotoComment::getComments($formData, $sortby, $sorttype, 0, true);    
		$totalPage = ceil($total/$this->recordPerPage);
		$curPage = $page;
		
			
		//get latest account
		$photocomments = Core_PhotoComment::getComments($formData, $sortby, $sorttype, (($page - 1)*$this->recordPerPage).','.$this->recordPerPage, false, true);
		
		for($i = 0; $i < count($photocomments); $i++)
		{
			$photocomments[$i]->photo = new Core_Photo($photocomments[$i]->pid);
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
		
				
		$this->registry->smarty->assign(array(	'photocomments'	=> $photocomments,
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
		$myPhotoComment = new Core_PhotoComment($id);
			
		if($myPhotoComment->id > 0)
		{
			if(Helper::checkSecurityToken())
			{
				//tien hanh xoa
				if($myPhotoComment->delete())
				{
					$redirectMsg = $this->registry->lang['controller']['succDelete'];
					
					$this->registry->me->writelog('photocomment_delete', $myPhotoComment->id, array('text' => substr(strip_tags($myPhotoComment->text), 100), 'photoid' => $myPhotoComment->pid));
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
	
	
    
    function editAction()
    {                         
        $id = (int)$this->registry->router->getArg('id');
        $myPhotoComment = new Core_PhotoComment($id);
        $redirectUrl = $this->getRedirectUrl();
        if($myPhotoComment->id > 0)
        {
			//get the photo of this comment
			$myPhotoComment->photo = new Core_Photo($myPhotoComment->pid);
			
            $error         = array();
	        $success     = array();
	        $contents     = '';
	        $formData     = array();
	        
			$formData['ffullname'] = $myPhotoComment->fullname;
			$formData['femail'] = $myPhotoComment->email;
			$formData['fwebsite'] = $myPhotoComment->website;
	        $formData['ftext'] = $myPhotoComment->text;
			$formData['fstatus'] = $myPhotoComment->status;
			
	        $_SESSION['securityToken'] = Helper::getSecurityToken();  //for delete link
	        
	        if(!empty($_POST['fsubmit']))
	        {
	            if($_SESSION['photocommentEditToken'] == $_POST['ftoken'])
	            {
	                $formData = array_merge($formData, $_POST);
	                
	                if($this->editActionValidator($formData, $error))
	                {
						$myPhotoComment->fullname = $formData['ffullname'];
						$myPhotoComment->email = $formData['femail'];
						$myPhotoComment->website = $formData['fwebsite'];
                       	$myPhotoComment->text = $formData['ftext'];
						$myPhotoComment->status = $formData['fstatus'];
	                    						
	                    if($myPhotoComment->updateData())
	                    {
	                       $success[] = $this->registry->lang['controller']['succEdit'];
	                       $this->registry->me->writelog('photocomment_edit', $myPhotoComment->id, array('photoid' => $myPhotoComment->pid));
	                    }                       
	                    else
	                    {
	                        $error[] = $this->registry->lang['controller']['errEdit'];    
	                    }
	                }
	            }
	        }
	        $_SESSION['photocommentEditToken']=Helper::getSecurityToken();//Tao token moi  
	        $this->registry->smarty->assign(array(   'formData'     => $formData, 
            										'myPhotoComment'	=> $myPhotoComment,
	                                                'redirectUrl'=> $redirectUrl,
	                                                'encoderedirectUrl'=> base64_encode($redirectUrl),
													'statusList'	=> Core_PhotoComment::getStatusList(),
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
	
		
	
    private function editActionValidator($formData, &$error)
    {
        $pass = true;
      
      	
                
        return $pass;
    }
    
    	
	
	
}
