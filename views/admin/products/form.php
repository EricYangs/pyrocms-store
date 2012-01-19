<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a store module for PyroCMS
 *
 * @author 		pyrocms-store Team - Jaap Jolman - Kevin Meier - Rudolph Arthur Hernandez - Gary Hussey
 * @website		http://www.odin-ict.nl/
 * @package 	pyrocms-store
 * @subpackage 	Store Module
**/
?>

<section class="title">
	<h4><?php echo lang('store_title_product_'.$action);?></h4>
</section>

<section class="item">
<?php echo form_open_multipart($this->uri->uri_string(), 'class="crud"'); ?>

<div class="form_inputs" id="products">
	<fieldset>
	<ul>
		<li class="even">
			<label for="categories_id"><?php echo lang('store_product_category','categories_id'); ?> <span>*</span></label>
			<div class="input"><?php echo form_dropdown('categories_id', $categories , set_value('categories_id', $product->categories_id)); ?></div>
		</li>	
		<li>
			<label for="name"><?php echo lang('store_product_name','name'); ?> <span>*</span></label>
			<div class="input"><?php echo form_input('name',set_value('name', $product->name),'maxlength="100" id="name"'); ?></div>
		</li>
		<li>
			<label for="html"><?php echo lang('store_product_html','html'); ?><span>*</span></label>
			<br style="clear: both;" />
			<?php echo form_textarea(array('id' => 'html', 'name' => 'html', 'value' => $product->html, 'rows' => 5, 'class' => 'wysiwyg-simple')); ?>
		</li>

		<li>
			<label for="meta_description"><?php echo lang('store_product_meta_description','meta_description'); ?></label>
   			<br style="clear: both;" />
			<?php echo form_textarea('meta_description', set_value('meta_description',$product->meta_description), ' class="" rows="3"');?>
		</li>
		<li>
            <label for="meta_keywords"><?php echo lang('global:keywords'); ?></label>
            <div class="input"><?php echo form_input('meta_keywords', $product->meta_keywords, 'id="meta_keywords"') ?></div>
		</li>
		<li>
			<label for="attributes_id"><?php echo lang('store_product_attributes','attributes_id'); ?></label>
			<div class="input"><?php echo form_input('attributes_id',set_value('attributes_id',$product->attributes_id),'maxlength="50"'); ?></div>
		</li>		
		<li>
			<label for="price"><?php echo lang('store_product_price','price'); ?> <span>*</span></label>
			<div class="input"><?php echo form_input('price',set_value('price',$product->price),'maxlength="10"'); ?></div>
		</li>
		<li>
			<label for="discount"><?php echo lang('store_product_discount','discount'); ?></label>
			<div class="input"><?php echo form_input('discount',set_value('discount',$product->discount),'maxlength="10"'); ?></div>
		</li>	
		<li>
			<label for="stock"><?php echo lang('store_product_stock','stock'); ?></label>
			<div class="input"><?php echo form_input('stock',set_value('stock',$product->stock),'maxlength="10"'); ?></div>
		</li>
		<li>
			<label for="limited"><?php echo lang('store_product_limited','limited'); ?></label>
			<div class="input"><?php echo form_input('limited',set_value('limited',$product->limited),'maxlength="10"'); ?></div>
		</li>
		<li>
			<label for="limited_used"><?php echo lang('store_product_limited_used','limited_used'); ?></label>
			<div class="input"><?php echo form_input('limited_used',set_value('limited_used',$product->limited_used),'maxlength="10"'); ?></div>
		</li>
		<li>
			<label for="images_id"><?php echo lang('store_product_images','images_id'); ?></label>
            <div class="input">
<!-- 			<?php echo form_input('images_id',set_value('images_id',$product->images_id),'maxlength="10"'); ?> -->
			<?php 
				if( isset($product_image) && $product_image){
					$output = '<a href="uploads/store/products/' . $product_image->filename . '"';
					$output .= ' rel="cbox_images" class="product_images"  >';
					$output .= '<img src="uploads/store/products/' . $product_image->name . '_thumb'. $product_image->extension;
					$output .= '" alt="' . $product_image->name . '" /></a>';
					echo $output;
				}
			?>
			<?php echo form_upload('userfile'); ?>
            </div>
		</li>		
		<li>
			<label for="thumbnail_id"><?php echo lang('store_product_thumbnail','thumbnail_id'); ?></label>
			<div class="input"><?php echo form_input('thumbnail_id',set_value('thumbnail_id',$product->thumbnail_id),'maxlength="10"'); ?>	</div>		
		</li>
		<li>
			<?php echo lang('store_product_allow_comments','allow_comments'); ?>
         <div class="input"><?php echo form_radio('allow_comments','1',TRUE).$this->lang->line('store_choice_yes'); ?>
         <?php echo form_radio('allow_comments','0',FALSE).$this->lang->line('store_choice_no'); ?></div>
		</li>		
	</ul>
	</fieldset>
</div>

<div class="buttons float-right padding-top">
	<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save_exit', 'cancel'))); ?>
</div>

<?php echo form_close(); ?>
</section>
<!-- <?php $this->load->view('fragments/wysiwyg', ''); ?> -->