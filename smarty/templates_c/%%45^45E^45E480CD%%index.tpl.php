<?php /* Smarty version 2.6.28, created on 2015-11-01 07:44:15
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'index.tpl', 29, false),array('modifier', 'replace', 'index.tpl', 29, false),array('function', 'html_options', 'index.tpl', 61, false),)), $this); ?>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<br>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>




<body style="width:500px;padding: 30px;">
    <form  method="post">
        <?php if (( ! empty ( $this->_tpl_vars['Announcements_show'] ) )): ?>    
            <input type="hidden" value=<?php echo $this->_tpl_vars['Announcements_show']->id; ?>
 name="id">
        <?php endif; ?> 
        <br>
        <label><input type = "radio" <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['Announcements_show']->private)) ? $this->_run_mod_handler('default', true, $_tmp, 'checked = ""') : smarty_modifier_default($_tmp, 'checked = ""')))) ? $this->_run_mod_handler('replace', true, $_tmp, 1, 'checked = ""') : smarty_modifier_replace($_tmp, 1, 'checked = ""')))) ? $this->_run_mod_handler('replace', true, $_tmp, 0, '') : smarty_modifier_replace($_tmp, 0, '')); ?>
 value = "1" name = "private">Частное лицо</label>
        <br>
        <label><input type = "radio" <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['Announcements_show']->private)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')))) ? $this->_run_mod_handler('replace', true, $_tmp, 0, 'checked = ""') : smarty_modifier_replace($_tmp, 0, 'checked = ""')))) ? $this->_run_mod_handler('replace', true, $_tmp, 1, '') : smarty_modifier_replace($_tmp, 1, '')); ?>
  value = "0" name = "private">Компания</label>
        <br>
        <div class="form-group">
            <label for="manager" class="col-md-5">Контактное лицо</label>
            <div class="col-md-8">
            </div><input type="text"  class="form-control" placeholder="Контактное лицо" maxlength="40" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']->manager)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="manager">
        </div>
        <div class="form-group">
            <label for="email" class="col-md-5">Электронная почта</label>
            <div class="col-md-8">
            </div><input type="text" class="form-control" placeholder="Email" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']->email)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="email">
        </div>
        <label  for="allow_mails"> <input type="checkbox" value="1" name="allow_mails" id="allow_mails" <?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['Announcements_show']->allow_mails)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')))) ? $this->_run_mod_handler('replace', true, $_tmp, 1, 'checked = ""') : smarty_modifier_replace($_tmp, 1, 'checked = ""')); ?>
 class="form-input-checkbox">
            <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> </label> </div>
    <br>
    <div class="form-group">
        <label for="seller_name" class="col-md-5"><b>Ваше имя </b></label>
        <div class="col-md-8">
        </div><input type="text" class="form-control" placeholder="Ваше имя" maxlength="40"  value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']->seller_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="seller_name">
    </div>
    <div class="form-group">
        <label class="col-md-5">Номер телефона </label>
        <div class="col-md-8">
        </div><input type="text" class="form-control" placeholder="Номер телефона" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']->phone)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="phone">       
    </div>
    <br>
    <label class="col-md-12">Город 
        <div>
            <select class="form-control"   title="Выберите Ваш город"  name="location_id">
                <option >-- Выберите Ваш город --</option>
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['location'],'selected' => $this->_tpl_vars['Announcements_show']->location_id), $this);?>

            </select>
        </div>
    </label>
    <br>
    <label class="col-md-12">Категория
        <div>
            <select class="form-control" title="Выберите категорию объявления"  name="category_id"> 
                <option >-- Выберите категорию объявления --</option>
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['category'],'selected' => $this->_tpl_vars['Announcements_show']->category_id), $this);?>

            </select>
        </div>
    </label>
    <br><br><br><br><br>
    <div class="form-group">
        <label class="col-md-5">Название объявления</label>
        <div class="col-md-8">
        </div><input type="text" class="form-control" placeholder="Название объявления" maxlength="50" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']->title)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="title">
    </div>
    
    <div class="form-group">
        <label class="col-md-5">Описание объявления</label> 
        <textarea class="form-control" rows="3" type="text" maxlength="3000" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']->description)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="description"></textarea>
    </div> 

    <br>
    <div class="form-group">
        <label class="col-md-5">Цена</label> 
        <div class="col-md-8">
        </div><input type="text" class="form-control" maxlength="9" placeholder="Руб." value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['Announcements_show']->price)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" name="price">
        <br><br>
    </div>
    <input type="submit" class="btn btn-default"  value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['save'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Сохранить') : smarty_modifier_default($_tmp, 'Сохранить')); ?>
"  name="main_form_submit" class="vas-submit-input">
    <br>
</form>
</body>


<?php if (( ! empty ( $this->_tpl_vars['Announcements'] ) )): ?>    
    <?php $_from = $this->_tpl_vars['Announcements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['value']):
?> 
        
        <a href="<?php echo $this->_tpl_vars['Location']; ?>
?id=<?php echo $this->_tpl_vars['value']->id; ?>
" ><?php echo $this->_tpl_vars['value']->title; ?>
</a>        
        |  Цена:   <?php echo $this->_tpl_vars['value']->price; ?>
    руб.  |  
        <a href="<?php echo $this->_tpl_vars['Location']; ?>
?id_del=<?php echo $this->_tpl_vars['value']->id; ?>
" >Удалить</a> 
        <br>          
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'table.tpl.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>