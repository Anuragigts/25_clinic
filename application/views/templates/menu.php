<?php
$level = $this->session->userdata('category');
$version = $this->menu_model->find_version();  

?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
		<!-- Creating the dynamic menu -->
        <ul class="nav" id="main-menu">
			<?php
			$parent_name="";
			$result_top_menu = $this->menu_model->find_menu($parent_name);
			foreach ($result_top_menu as $top_menu):
				$id = $top_menu['id'];
				$parent_name = $top_menu['menu_name'];
				//Does the user have access to this menu?
				if($this->menu_model->has_access($top_menu['menu_name'],$level)){ 
					if($this->menu_model->is_module_active($top_menu['required_module'])){ ?>
				<li>
					<a href="<?= site_url( $top_menu['menu_url'] ); ?>"><i class="fa <?php echo $top_menu['menu_icon']; ?> fa-3x"></i><?php echo $top_menu['menu_text'];  ?></a>
					<?php 
						//Select all Childs
						$result_sub_menu = $this->menu_model->find_menu($parent_name);
						$rowcount= count($result_sub_menu);	
						if($rowcount != 0){?>							
							<ul class="nav nav-second-level">
								<?php
								foreach ($result_sub_menu as $sub_menu){	
									//Check access for sub menu
									if($this->menu_model->has_access($sub_menu['menu_name'],$level)){ 
										if($this->menu_model->is_module_active($sub_menu['required_module'])){ ?>
										<li>
											<a href="<?php echo site_url($sub_menu['menu_url']); ?>"><?php echo $sub_menu['menu_text']; ?></a>
											<?php //Select all Childs
												$result_sub_menu2 = $this->menu_model->find_menu($sub_menu['menu_name']);
												$rowcount2= count($result_sub_menu2);	
												if($rowcount2 != 0){?>							
													<ul class="nav nav-third-level">
													<?php
													foreach ($result_sub_menu2 as $sub_menu2):
														if($this->menu_model->has_access($sub_menu2['menu_name'],$level)){ 
															if($this->menu_model->is_module_active($sub_menu2['required_module'])){ ?>
																<li><a href="<?php echo site_url($sub_menu2['menu_url']); ?>"><?php echo $sub_menu2['menu_text']; ?></a></li>							
													<?php 
															}
														}
													endforeach;
													?>
													</ul>
												<?php  } ?>
										</li>							
										<?php  } ?>
									<?php  } ?>
								<?php  } ?>
							</ul>
						<?php  } ?>
				</li>				
					<?php
					}	
					}
			endforeach;
			
			?>
			<li>
				
				<a target="_blank" href="http://nuyouhomoeo.com"><?php echo $this->lang->line('cmp_version');?> <?php echo $version['current_version']; ?></a>
				<a target="_blank" title="<?php echo $this->lang->line('cmp_name');?>" href="http://www.igravitas.com"><?php echo $this->lang->line('copyright');?> <?php echo $this->lang->line('cmp_name');?></a>
			</li>
        </ul>
               
    </div>
            
</nav>  

<div id="page-wrapper" >