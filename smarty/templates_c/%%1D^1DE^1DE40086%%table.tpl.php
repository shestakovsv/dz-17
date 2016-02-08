<?php /* Smarty version 2.6.28, created on 2016-02-08 17:39:23
         compiled from table.tpl */ ?>

<h2 class="sub-header">Все объявления</h2>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


<div class="table-responsive">
    <table class="table table table-hover" margin="auto" id="myTable" >

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
                    <td class="id <?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->id; ?>
 </td>
                    <td><a href="<?php echo $this->_tpl_vars['Location']; ?>
?id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->title; ?>
</a></td>
                    <td><?php echo $this->_tpl_vars['value']->description; ?>
</td>
                    <td><?php echo $this->_tpl_vars['value']->price; ?>
    руб.</td>
                    <td><button type="button" class="btn btn-default">Удалить</button></td>
                                    </tr>          
            <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
</div>