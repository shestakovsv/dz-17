<?php /* Smarty version 2.6.28, created on 2015-11-19 16:44:13
         compiled from table.tpl */ ?>

<h2 class="sub-header">Все объявления</h2>
<div class="table-responsive">
    <table class="table table table-hover" margin="auto" >
        <thead>
            <tr>
                <th>#id</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php $_from = $this->_tpl_vars['announcements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['value']):
?>
                <?php if (( $this->_tpl_vars['value']->private == 0 )): ?>    
                    <tr class="success">
                    <?php else: ?>
                    <tr>      
                    <?php endif; ?> 

                    <td><a href="<?php echo $this->_tpl_vars['Location']; ?>
?id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->id; ?>
</a></td>
                    <td><a href="<?php echo $this->_tpl_vars['Location']; ?>
?id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->title; ?>
</a></td>
                    <td><?php echo $this->_tpl_vars['value']->description; ?>
</td>
                    <td><?php echo $this->_tpl_vars['value']->price; ?>
    руб.</td>
                    <td><a href="<?php echo $this->_tpl_vars['Location']; ?>
?id_del=<?php echo $this->_tpl_vars['value']->id; ?>
" >Удалить</a></td>
                </tr>          
            <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
</div>