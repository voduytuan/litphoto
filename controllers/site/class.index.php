<?php

Class Controller_Site_Index Extends Controller_Site_Base 
{
	function indexAction() 
	{
		$userCount = Core_User::getUsers(array(), '', '', '', true);
		
		//if there is no user, redirect to installation
		if($userCount == 0)
		{
			header('location: ' . $this->registry->conf['rooturl'] . 'site/install');
		}
		else
		{
			$formData = array('fenable' => 1);
			$page 			= (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;
			
			
			$paginateUrl = $this->registry->conf['rooturl'];
			
			$myPhotoCategory = new Core_PhotoCategory();
			if(isset($_GET['category']) && $_GET['category'] > 0)
			{
				
				$formData['fcategory'] = (int)$_GET['category'];
				
				$myPhotoCategory->getData($formData['fcategory']);
				if($myPhotoCategory->id > 0)
				{
					$paginateUrl = $myPhotoCategory->getPhotoCategoryPath() . '/';
					$this->registry->smarty->assign('myPhotoCategory', $myPhotoCategory);
				}
				else
				{
					//redirect to correct url
					header('location: ' . $this->registry->conf['rooturl']);	
					exit();
				}
			}
			
			//tim tong so record
			$recordPerPage = $this->registry->setting['photo']['recordPerPage'];
			$total = Core_Photo::getPhotos($formData, 'id', 'DESC', $recordPerPage, true, true, true);
			$totalPage = ceil($total/$recordPerPage);
			$curPage = $page;
			
			
			//get current page photos
			$photos = Core_Photo::getPhotos($formData, 'id', 'DESC', (($page - 1)*$recordPerPage).','.$recordPerPage, false, true, true);
			
			
			$this->registry->smarty->assign(array('photos' => $photos,
												'myPhotoCategory' => $myPhotoCategory,
												'formData'		=> $formData,
												'paginateurl' 	=> $paginateUrl, 
												'total'			=> $total,
												'totalPage' 	=> $totalPage,
												'curPage'		=> $curPage
												));
												
												
			$contents = $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'index.tpl'); 
			
			if($myPhotoCategory->if > 0)
			{
				$pageTitle = $myPhotoCategory->title;
			}
			else
			{
				$pageTitle = $this->registry->lang['controller']['pageTitle'];
			}
			
			$this->registry->smarty->assign(array('contents' => $contents,
											'pageTitle' => $pageTitle,
											'pageKeyword' => $this->registry->lang['controller']['pageKeyword'],
											'pageDescription' => $this->registry->lang['controller']['pageDescription'],
											));
			
			$this->registry->smarty->display($this->registry->smartyControllerGroupContainer.'index.tpl');
		}
		
	} 
	
	
	public function detailAction()
	{
		$photoid = $_GET['photoid'];
		$myPhoto = new Core_Photo($photoid);
		if($myPhoto->id > 0)
		{
			$myPhoto->category = new Core_PhotoCategory($myPhoto->pcid);
			
			//////////////////////////////////
			//PHOTO COMMENT PROCESS
			$error = $success = $formData = array();
			$page 			= (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;
			$paginateUrl = $myPhoto->getPhotoPath() . '/';
			
			if(isset($_POST['fsubmit']))
			{
				$formData = $_POST;
				
				if($this->commentaddValidate($formData, $error))
				{
					$myPhotoComment = new Core_PhotoComment();
					$myPhotoComment->pid = $myPhoto->id;
					$myPhotoComment->fullname = Helper::plaintext($formData['ffullname']);
					$myPhotoComment->email = $formData['femail'];
					$myPhotoComment->website = $formData['fwebsite'];
					$myPhotoComment->status = Core_PhotoComment::STATUS_PENDING;
					$myPhotoComment->text = Helper::plaintext($formData['ftext']);
					if($myPhotoComment->addData())
					{
						$success[] = $this->registry->lang['controller']['succCommentAdd'];
						$formData = array();
						
						//update countcomment of this photo
						$myPhoto->refreshCountcomment();
					}
					else
					{
						$error[] = $this->registry->lang['controller']['errCommentAdd'];
					}
				}
			}
			
			//tim tong so record
			$recordPerPage = $this->registry->setting['photocomment']['recordPerPage'];
			$total = Core_PhotoComment::getComments(array('fphotoid' => $myPhoto->id), '', '', '', true);
			$totalPage = ceil($total/$recordPerPage);
			$curPage = $page;
			
			
			//get current page photos
			$comments = Core_PhotoComment::getComments($formData, 'id', 'ASC', (($page - 1)*$recordPerPage).','.$recordPerPage, false);
			// END PHOTO COMMENT PROCESS
			////////////////////////////////////
			
			$this->registry->smarty->assign(array('myPhoto' => $myPhoto,
												'comments'		=> $comments,
												'formData'		=> $formData,
												'success'		=> $success,
												'error'			=> $error,
												'paginateurl' 	=> $paginateUrl, 
												'total'			=> $total,
												'totalPage' 	=> $totalPage,
												'curPage'		=> $curPage
												));
												
												
			$contents = $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'detail.tpl'); 
			$this->registry->smarty->assign(array('contents' => $contents,
											'pageTitle' => $myPhoto->title,
											'pageKeyword' => $this->registry->lang['controller']['pageKeyword'],
											'pageDescription' => substr($myPhoto->description, 200),
											));
			
			$this->registry->smarty->display($this->registry->smartyControllerGroupContainer.'index.tpl');
		}
		else
		{
			$this->notfound();
		}
	}
	
	
	///////////////////
	private function commentaddValidate($formData, &$error)
	{
		$pass = true;
		
		
		if($formData['ffullname'] == '')
		{
			$pass = false;
			$error[] = $this->registry->lang['controller']['errCommentFullname'];
		}
		
		if(!Helper::ValidatedEmail($formData['femail']))
		{
			$pass = false;
			$error[] = $this->registry->lang['controller']['errCommentEmail'];
		}
		
		if($formData['ftext'] == '')
		{
			$pass = false;
			$error[] = $this->registry->lang['controller']['errCommentText'];
		}
		
		//check security code
		if(strlen($formData['fcaptcha']) == 0 || $formData['fcaptcha'] != $_SESSION['verify_code'])
		{
			$error[] = $this->registry->lang['controller']['errSecurityCode'];   
			$pass = false;
		}
		
		
		return $pass;
	}
	
	
	
}

?>