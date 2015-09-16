<?php /* Smarty version 2.6.28, created on 2015-09-16 04:59:35
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'index.tpl', 14, false),array('modifier', 'replace', 'index.tpl', 14, false),array('function', 'html_options', 'index.tpl', 34, false),)), $this); ?>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<br>


<form  method="post">
    <br>
    <label><input type = "radio" <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['Announcements_show']['private'])) ? $this->_run_mod_handler('default', true, $_tmp, 'checked = ""') : smarty_modifier_default($_tmp, 'checked = ""')))) ? $this->_run_mod_handler('replace', true, $_tmp, 1, 'checked = ""') : smarty_modifier_replace($_tmp, 1, 'checked = ""')))) ? $this->_run_mod_handler('replace', true, $_tmp, 0, '') : smarty_modifier_replace($_tmp, 0, '')); ?>
 value = "1" name = "private">Частное лицо</label>
    <label><input type = "radio" <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['Announcements_show']['private'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')))) ? $this->_run_mod_handler('replace', true, $_tmp, 0, 'checked = ""') : smarty_modifier_replace($_tmp, 0, 'checked = ""')))) ? $this->_run_mod_handler('replace', true, $_tmp, 1, '') : smarty_modifier_replace($_tmp, 1, '')); ?>
  value = "0" name = "private">Компания</label>
    <br>
    <label><b>Контактное лицо</b></label> <input type="text" maxlength="40" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']['manager'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="manager">
    <br> 
    <label>Электронная почта</label><input type="text" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']['email'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="email">
    <br>
    <label  for="allow_mails"> <input type="checkbox" value="1" name="allow_mails" id="allow_mails" <?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['Announcements_show']['allow_mails'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')))) ? $this->_run_mod_handler('replace', true, $_tmp, 1, 'checked = ""') : smarty_modifier_replace($_tmp, 1, 'checked = ""')); ?>
 class="form-input-checkbox">
        <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> </label> </div>

<br>
<label><b>Ваше имя </b></label><input type="text" maxlength="40"  value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']['seller_name'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="seller_name">
<br>  

<label>Номер телефона </label><input type="text" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']['phone'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="phone">
<br>

<label>Город 
    <select title="Выберите Ваш город"  name="location_id">
        <option >-- Выберите Ваш город --</option>
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['location'],'selected' => $this->_tpl_vars['Announcements_show']['location_id']), $this);?>

    </select>
</label>
<br>
<label>Категория
    <select title="Выберите категорию объявления"  name="category_id"> 
        <option >-- Выберите категорию объявления --</option>
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['category'],'selected' => $this->_tpl_vars['Announcements_show']['category_id']), $this);?>

    </select>
</label>

<br>
<label>Название объявления</label> <input type="text" maxlength="50" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="title">
<br>
<label>Описание объявления</label><input type="text" maxlength="3000" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']['description'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="description">
<br>
<label>Цена</label> <input type="text" maxlength="9" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
" name="price"><span>руб.</span>
<br><br>
<input type="submit" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['save'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Сохранить') : smarty_modifier_default($_tmp, 'Сохранить')); ?>
"  name="main_form_submit" class="vas-submit-input" > 
</form>




<?php if (( ! empty ( $this->_tpl_vars['Announcements'] ) )): ?>    
    <?php $_from = $this->_tpl_vars['Announcements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['value']):
?>      
        <a href="<?php echo $this->_tpl_vars['Location']; ?>
?id=<?php echo $this->_tpl_vars['id']; ?>
" ><?php echo $this->_tpl_vars['value']['title']; ?>
</a>        
        |  Цена:   <?php echo $this->_tpl_vars['value']['price']; ?>
    руб.  |  
        <a href="<?php echo $this->_tpl_vars['Location']; ?>
?id_del=<?php echo $this->_tpl_vars['id']; ?>
" >Удалить</a> 
        <br>          
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>