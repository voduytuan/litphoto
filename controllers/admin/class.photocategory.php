<?php

Class Controller_Admin_PhotoCategory Extends Controller_Admin_Base 
{
	private $recordPerPage = 20;
	
	function indexAction() 
	{
		$error 			= array();
		$success 		= array();
		$warning 		= array();
		$formData 		= array('fbulkid' => array());
		$_SESSION['securityToken']=Helper::getSecurityToken();//Token
		$page 			= (int)($this->registry->router->getArg('page'))>0?(int)($this->registry->router->getArg('page')):1;
		
		if(!empty($_POST['fsubmitbulk']))
		{
            if($_SESSION['photocategoryBulkToken']==$_POST['ftoken'])
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
                        $deletedCategories = array();
                        $cannotDeletedCategories = array();
                        foreach($delArr as $id)
                        {
                            //check valid user and not admin user
                            $myPhotoCategory = new Core_PhotoCategory($id);
                            
                            if($myPhotoCategory->id > 0)
                            {
                                //tien hanh xoa
                                if($myPhotoCategory->delete())
                                {
                                    $deletedCategories[] = $myPhotoCategory->title;
                                    $this->registry->me->writelog('photocategory_delete', $myPhotoCategory->id, array('title' => $myPhotoCategory->title));      
                                }
                                else
                                    $cannotDeletedCategories[] = $myPhotoCategory->title;
                            }
                            else
                                $cannotDeletedCategories[] = $myPhotoCategory->title;
                        }
                        
                        if(count($deletedCategories) > 0)
                            $success[] = str_replace('###categorytitle###', implode(', ', $deletedCategories), $this->registry->lang['controller']['succDelete']);
                        
                        if(count($cannotDeletedCategories) > 0)
                            $error[] = str_replace('###categorytitle###', implode(', ', $cannotDeletedCategories), $this->registry->lang['controller']['errDelete']);
                    }
                    else
                    {
                        //bulk action not select, show error
                        $warning[] = $this->registry->lang['default']['bulkActionInvalidWarn'];
                    }
                }
            }

			// order updated submit form edit page, not index page
			// So, we must redirect to caller edit page
			if($_GET['returncategory'] > 0)
			{
				header('location: ' . $this->registry->conf['rooturl_admin'] . 'photocategory/edit/id/' . $_GET['returncategory'] . '?from=index&do=delete&success=' . count($deletedCategories));
				exit();
			}
			
		}
		
		if(!empty($_POST['fchangeorder']))
		{
            if($_SESSION['photocategoryBulkToken']==$_POST['ftoken'])
            {
                $items = $_POST['fdisplayorder'];
                $updatedCategories = array();
                foreach($items as $itemId => $itemOrder)
                {
                    $itemOrder = (int)$itemOrder;
                    $myPhotoCategory = new Core_PhotoCategory($itemId);
                    if($myPhotoCategory->displayorder != $itemOrder && $myPhotoCategory->id > 0)
                    {
                        $myPhotoCategory->displayorder = $itemOrder;
                        if($myPhotoCategory->updateData())
                        {
                            $updatedCategories[] = $myPhotoCategory->title;
                            $this->registry->me->writelog('photocategory_changeorder', $myPhotoCategory->id, array('title' => $myPhotoCategory->title, 'displayorder' => $myPhotoCategory->displayorder));
                        }
                    }    
                }
                
                if(count($updatedCategories) > 0)
                {
                    $success[] = str_replace('###categorytitle###', implode(', ', $updatedCategories), $this->registry->lang['controller']['succUpdate']);    
                }
            }
			
			// order updated submit form edit page, not index page
			// So, we must redirect to caller edit page
			if($_GET['returncategory'] > 0)
			{
				header('location: ' . $this->registry->conf['rooturl_admin'] . 'photocategory/edit/id/' . $_GET['returncategory'] . '?from=index&do=changeorder&success=' . count($success));
				exit();
			}
			    		
		}
		
		$_SESSION['photocategoryBulkToken']=Helper::getSecurityToken();//Gan token de kiem soat viec nhan nut submit form   		
		$paginateUrl = $this->registry->conf['rooturl_admin'].'photocategory/index/';      
		
				
		//tim tong so
		$total = Core_PhotoCategory::getCategories(array('fparentid' => 0), '', '', '', true);    
		$totalPage = ceil($total/$this->recordPerPage);
		$curPage = $page;
		
			
		//get latest account
		$categories = Core_PhotoCategory::getCategories(array('fparentid' => 0), '', '', (($page - 1)*$this->recordPerPage).','.$this->recordPerPage, false, true);
		
		
		//build redirect string
		$redirectUrl = $paginateUrl;
		if($curPage > 1)
			$redirectUrl .= 'page/' . $curPage;
			
		
		$redirectUrl = base64_encode($redirectUrl);
		
				
		$this->registry->smarty->assign(array(	'categories' 	=> $categories,
												'formData'		=> $formData,
												'success'		=> $success,
												'error'			=> $error,
												'warning'		=> $warning,
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
	
		
	function addAction()
	{
		$error 	= array();
		$success 	= array();
		$contents 	= '';
		$formData 	= array();
		
		$parentid = (int)($this->registry->router->getArg('parentid'));
		if($parentid > 0)
			$formData['fparentid'] = $parentid; 
			
		
		if(!empty($_POST['fsubmit']))
		{
            if($_SESSION['photocategoryAddToken']==$_POST['ftoken'])
            {
                 $formData = array_merge($formData, $_POST);
                
                                
                if($this->addActionValidator($formData, $error))
                {
                    $myPhotoCategory = new Core_PhotoCategory();
                    $myPhotoCategory->title = $formData['ftitle'];
                    $myPhotoCategory->slug = $formData['fslug'];
					$myPhotoCategory->description = $formData['fdescription'];
                    $myPhotoCategory->enable = (int)$formData['fenable']==1?1:0;
                    $myPhotoCategory->parentid = (int)$formData['fparentid'];
                    if($myPhotoCategory->addData())
                    {
                        $success[] = str_replace('###categorytitle###', $myPhotoCategory->title, $this->registry->lang['controller']['succAdd']);
                        $this->registry->me->writelog('photocategory_add', $myPhotoCategory->id, array('title' => $myPhotoCategory->title, 'displayorder' => $myPhotoCategory->displayorder));
                        $formData = array('fparentid' => $formData['fparentid']);      
                    }
                    else
                    {
                        $error[] = $this->registry->lang['controller']['errAdd'];            
                    }
                }
            }
            
		}
		
		$_SESSION['photocategoryAddToken']=Helper::getSecurityToken();//Tao token moi
		
		$this->registry->smarty->assign(array(	'formData' 		=> $formData,
												'parentCategories' => Core_PhotoCategory::getFullCategories(0, 0, '', array()),
												'redirectUrl'	=> $this->getRedirectUrl(),
												'error'			=> $error,
												'success'		=> $success,
												
												));
		$contents .= $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'add.tpl');
		$this->registry->smarty->assign(array(
												'pageTitle'	=> $this->registry->lang['controller']['pageTitle_add'],
												'contents' 			=> $contents));
		$this->registry->smarty->display($this->registry->smartyControllerGroupContainer . 'index.tpl');
	}
	
	
	
	function editAction()
	{
        global $langCode;
		$id = (int)$this->registry->router->getArg('id');
		$myPhotoCategory = new Core_PhotoCategory($id);
		
		$redirectUrl = $this->getRedirectUrl();
		if($myPhotoCategory->id > 0)
		{
			$error 		= array();
			$success 	= array();
			$contents 	= '';
			$formData 	= array();
			
			$formData['fbulkid'] = array();
			$formData['fid'] = $myPhotoCategory->id;
			$formData['ftitle'] = $myPhotoCategory->title;
			$formData['fslug'] = $myPhotoCategory->slug;
			$formData['fdescription'] = $myPhotoCategory->description;
			$formData['fenable'] = $myPhotoCategory->enable;
			$formData['fdisplayorder'] = $myPhotoCategory->displayorder;
			$formData['fparentid'] = $myPhotoCategory->parentid;


			//check this page redirected from index page after update subcategory order
			
			
			if(!empty($_POST['fsubmit']))
			{
                if($_SESSION['photocategoryEditToken']==$_POST['ftoken'])
                {
                    $formData = array_merge($formData, $_POST);
                    					
                    if($this->editActionValidator($formData, $error))
                    {
                        $myPhotoCategory->displayorder = (int)$formData['fdisplayorder'];
                        $myPhotoCategory->parentid = (int)$formData['fparentid'];
                        $myPhotoCategory->enable = (int)$formData['fenable']==1?1:0;
                        $myPhotoCategory->title = $formData['ftitle'];          
                        $myPhotoCategory->slug = $formData['fslug']; 
         				$myPhotoCategory->description = $formData['fdescription'];
                        
                        if($myPhotoCategory->updateData())
                        {
                            $success[] = str_replace('###categorytitle###', $myPhotoCategory->title, $this->registry->lang['controller']['succUpdate']);
                            $this->registry->me->writelog('photocategory_edit', $myPhotoCategory->id, array('title' => $myPhotoCategory->title, 'displayorder' => $myPhotoCategory->displayorder));
                        }
                        else
                        {
                            $error[] = $this->registry->lang['controller']['errUpdate'];            
                        }
                    }
                }
                
				    
			}
			elseif(isset($_GET['from']) && $_GET['from'] == 'index')	//elseif to prevent show this after submit edit form :)
			{
				if($_GET['do'] == 'changeorder')
				{
					if($_GET['success'] > 0)
						$success[] = str_replace('###categorytitle###', '', $this->registry->lang['controller']['succUpdate']);
					else
						$error[] = str_replace('###categorytitle###', '', $this->registry->lang['controller']['errUpdate']);
				}
				elseif($_GET['do'] == 'delete')
				{
					if($_GET['success'] > 0)
						$success[] = str_replace('###categorytitle###', '', $this->registry->lang['controller']['succDelete']);
					else
						$error[] = str_replace('###categorytitle###', '', $this->registry->lang['controller']['errDelete']);
				}
				
			}
			
			$_SESSION['photocategoryEditToken'] = Helper::getSecurityToken();//Tao token moi
			
			$this->registry->smarty->assign(array(	'formData' 	=> $formData,
													'subcategories' => $myPhotoCategory->getSub(true),
													'parentCategories' => Core_PhotoCategory::getFullCategories(0, 0, '', array()),
													'redirectUrl'=> $redirectUrl,
													'error'		=> $error,
													'success'	=> $success,
													
													));
			$contents .= $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'edit.tpl');
			$this->registry->smarty->assign(array(
													'pageTitle'	=> $this->registry->lang['controller']['pageTitle_edit'],
													'contents' 			=> $contents));
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

	function deleteAction()
	{
		$id = (int)$this->registry->router->getArg('id');
		$myPhotoCategory = new Core_PhotoCategory($id);
		if($myPhotoCategory->id > 0)
		{
			//tien hanh xoa
			if($myPhotoCategory->delete())
			{
				$redirectMsg = str_replace('###categorytitle###', $myPhotoCategory->title, $this->registry->lang['controller']['succDelete']);
				
				$this->registry->me->writelog('photocategory_delete', $myPhotoCategory->id, array('title' => $myPhotoCategory->title));  	
			}
			else
			{
				$redirectMsg = str_replace('###categorytitle###', $myPhotoCategory->title, $this->registry->lang['controller']['errDelete']);
			}
			
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
	
	####################################################################################################
	####################################################################################################
	####################################################################################################
	
	//Kiem tra du lieu nhap trong form them moi	
	private function addActionValidator($formData, &$error)
	{
		$pass = true;
		
		
		if(strlen($formData['ftitle']) == 0)
		{
			$error[] = $this->registry->lang['controller']['errTitleRequired'];
           	$pass = false;
		}
		
		
		return $pass;
	}
	//Kiem tra du lieu nhap trong form cap nhat
	private function editActionValidator($formData, &$error)
	{
		$pass = true;
		
		if(strlen($formData['ftitle']) == 0)
		{
			$error[] = $this->registry->lang['controller']['errTitleRequired'];
           	$pass = false;
		}
				
		return $pass;
	}
}

?>