<?php /* Smarty version 2.6.28, created on 2015-11-01 06:28:27
         compiled from table.tpl */ ?>
<table class="table table-hover">
  ...
</table>

<h2 class="sub-header">Все объявления</h2>
          <div class="table-responsive">
            <table class="table table table-hover">
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
                 <?php echo $this->_tpl_vars['ads_rows']; ?>

              
              </tbody>
            </table>
          </div>