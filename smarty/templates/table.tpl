
<h2 class="sub-header">Все объявления</h2>
{*<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>*}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
{*https://yastatic.net/jquery/2.1.4/jquery.min.js*}
{*<Сценарий  SRC = "https://yastatic.net/jquery/2.1.4/jquery.min.js"></ Скрипт>*}


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
            {foreach from=$announcements key=id item=value}
                {if ($value->private == 0)}    
                    <tr class="success">
                    {else}
                    <tr>      
                    {/if} 
{*                    <td><a href="{$Location}?id={$value->id}">{$value->id}</a></td>*}
                    <td class="id">{$value->id} </td>
                    <td><a href="{$Location}?id={$value->id}">{$value->title}</a></td>
                    <td>{$value->description}</td>
                    <td>{$value->price}    руб.</td>
                    <td><button type="button" class="btn btn-default">Удалить</button></td>
                    {*                    <td><a href="{$Location}?id_del={$value->id}" id="del">Удалить</a></td>*}
                </tr>          
            {/foreach}
        </tbody>
    </table>
</div>
