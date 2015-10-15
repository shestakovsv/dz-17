
{* форма ввода вывода объявлений *}


{include file='header.tpl'}



<br>


<form  method="post">
    <br>
    <label><input type = "radio" {$Announcements_show->private|default:'checked = ""'|replace:1:'checked = ""'|replace:0:''} value = "1" name = "private">Частное лицо</label>
    <label><input type = "radio" {$Announcements_show->private|default:''|replace:0:'checked = ""'|replace:1:''}  value = "0" name = "private">Компания</label>
    <br>
    <label><b>Контактное лицо</b></label> <input type="text" maxlength="40" value="{$Announcements_show->manager|default:''}" name="manager">
    <br> 
    <label>Электронная почта</label><input type="text" value="{$Announcements_show->email|default:''}" name="email">
    <br>
    <label  for="allow_mails"> <input type="checkbox" value="1" name="allow_mails" id="allow_mails" {$Announcements_show->allow_mails|default:''|replace:1:'checked = ""'} class="form-input-checkbox">
        <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> </label> </div>

<br>
<label><b>Ваше имя </b></label><input type="text" maxlength="40"  value="{$Announcements_show->seller_name|default:''}" name="seller_name">
<br>  

<label>Номер телефона </label><input type="text" value="{$Announcements_show->phone|default:''}" name="phone">
<br>

<label>Город 
    <select title="Выберите Ваш город"  name="location_id">
        <option >-- Выберите Ваш город --</option>
        {html_options options=$location selected=$Announcements_show->location_id}
    </select>
</label>
<br>
<label>Категория
    <select title="Выберите категорию объявления"  name="category_id"> 
        <option >-- Выберите категорию объявления --</option>
        {html_options options=$category selected=$Announcements_show->category_id}
    </select>
</label>

<br>
<label>Название объявления</label> <input type="text" maxlength="50" value="{$Announcements_show->title|default:''}" name="title">
<br>
<label>Описание объявления</label><input type="text" maxlength="3000" value="{$Announcements_show->description|default:''}" name="description">
<br>
<label>Цена</label> <input type="text" maxlength="9" value="{$Announcements_show->price|default:'0'}" name="price"><span>руб.</span>
<br><br>
<input type="submit" value="{$save|default:'Сохранить'}"  name="main_form_submit" class="vas-submit-input" > 
</form>


{*Announcements[48]->$title()*}
{* Вывод объявлений в списке *}

{if (!empty($Announcements))}    
    {foreach from=$Announcements key=id item=value}      
        <a href="{$Location}?id={$value->id}" >{$value->title}</a>        
        |  Цена:   {$value->price}    руб.  |  
        <a href="{$Location}?id_del={$value->id}" >Удалить</a> 
        <br>          
    {/foreach}
{/if}





{include file='footer.tpl'}
