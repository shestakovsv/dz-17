<?php /* Smarty version 2.6.28, created on 2015-08-13 12:14:13
         compiled from index.tpl */ ?>

<form  method="post">
<br>
<label><input type = "radio" checked = "" value = "1" name = "private">Частное лицо</label>
<label><input type = "radio" <?php echo $this->_tpl_vars['checked']; ?>
  value = "0" name = "private">Компания</label>
<br>
<label><b>Контактное лицо</b></label> <input type="text" maxlength="40" value="<?php echo $this->_tpl_vars['manager']; ?>
" name="manager">
<br> 
<label>Электронная почта</label><input type="text" value="<?php echo $this->_tpl_vars['email']; ?>
" name="email">
<br>

<?php if ($this->_tpl_vars['allow_mails'] == 1): ?>
    <label  for="allow_mails"> <input type="checkbox" value="1" name="allow_mails" id="allow_mails" CHECKED class="form-input-checkbox">
        <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> </label> </div>
    <?php else: ?>
<label  for="allow_mails"> <input type="checkbox" value="1" name="allow_mails" id="allow_mails"  class="form-input-checkbox">
    <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> </label> </div> 
<?php endif; ?>

<br>
<label><b>Ваше имя </b></label><input type="text" maxlength="40"  value="<?php echo $this->_tpl_vars['seller_name']; ?>
" name="seller_name">
<br>  

<label>Номер телефона </label><input type="text" value="<?php echo $this->_tpl_vars['phone']; ?>
" name="phone">
<br>
<label>Город</label> 
<select title="Выберите Ваш город"  name="location_id">
    <option >-- Города --</option>
    <?php $_from = $this->_tpl_vars['location']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['city']):
?>
        <?php if ($this->_tpl_vars['city'] == $this->_tpl_vars['location_id']): ?>
            <?php $this->assign('selected', 'selected=""'); ?>            
        <?php else: ?>
            <?php $this->assign('selected', ''); ?>
        <?php endif; ?>
        <option data-coords=",," <?php echo $this->_tpl_vars['selected']; ?>
  value="<?php echo $this->_tpl_vars['value']; ?>
"  ><?php echo $this->_tpl_vars['city']; ?>
 </option>
    <?php endforeach; endif; unset($_from); ?>
    <option id="select-region" value="0">Выбрать другой...</option> </select> 
<br>

<label>Категория</label> 
<select title="Выберите категорию объявления"  name="category_id" > 
    <option >-- категории --</option>
    <optgroup label="Транспорт">
        <?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['category_typ']):
?>
            <?php if ($this->_tpl_vars['category_typ'] == $this->_tpl_vars['category_id']): ?>
                <?php $this->assign('selected', 'selected=""'); ?>
            <?php else: ?>
                <?php $this->assign('selected', ''); ?>
            <?php endif; ?>
            <option data-coords=",," <?php echo $this->_tpl_vars['selected']; ?>
  value="<?php echo $this->_tpl_vars['value']; ?>
"  ><?php echo $this->_tpl_vars['category_typ']; ?>
</option>            
        <?php endforeach; endif; unset($_from); ?>
    </optgroup></select>

<br>
<label>Название объявления</label> <input type="text" maxlength="50" value="<?php echo $this->_tpl_vars['title']; ?>
" name="title">
<br>
<label>Описание объявления</label><input type="text" maxlength="3000" value="<?php echo $this->_tpl_vars['description']; ?>
" name="description">
<br>
<label>Цена</label> <input type="text" maxlength="9" value="<?php echo $this->_tpl_vars['price']; ?>
" name="price"><span>руб.</span>
<br><br>
<input type="submit" value="Сохранить изменения"  name="main_form_submit" class="vas-submit-input" > 
</form>

<br><br>

<?php if (( ! empty ( $this->_tpl_vars['Announcements'] ) )): ?>
   
    
    <?php $_from = $this->_tpl_vars['Announcements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['value']):
?>
        
        
        <a href="<?php echo $this->_tpl_vars['Location']; ?>
?id=<?php echo $this->_tpl_vars['id']; ?>
" ><?php echo $this->_tpl_vars['Announcements'][$this->_tpl_vars['id']]['title']; ?>
</a>        
        |  Цена:   <?php echo $this->_tpl_vars['Announcements'][$this->_tpl_vars['id']]['price']; ?>
    руб.  |  
        <a href="<?php echo $this->_tpl_vars['Location']; ?>
?id_del=<?php echo $this->_tpl_vars['id']; ?>
" >Удалить</a>
        <br>
       
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>