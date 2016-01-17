
{* форма ввода вывода объявлений *}


{include file='header.tpl'}

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<br>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


<script src="del.js"></script>

<div id="container"></div>


{* Добавляем немного прогноза погоды с сервера погоды *}
{*{fetch file='http://www.myweather.com/68502/'}*}


<body style="width:700px;padding:30px;margin:auto;">
    <form class="form-horizontal" method="POST" role="form" margin="auto">
        {if (!empty($announcements_show))}    
            <input type="hidden" class="idt" value={$announcements_show->id} name="id">
        {/if} 
        <br>
        <div class="form-group">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-8">
                <label><input type = "radio" {$announcements_show->private|default:'checked = ""'|replace:1:'checked = ""'|replace:0:''} value = "1" name = "private">Частное лицо</label>
                <label><input type = "radio" {$announcements_show->private|default:''|replace:0:'checked = ""'|replace:1:''}  value = "0" name = "private">Компания</label>
            </div>
        </div>               
        <div class="form-group">
            <label for="manager" class="col-sm-4">Контактное лицо</label>
            <div class="col-sm-8">
                <input type="text"  class="form-control" placeholder="Контактное лицо" maxlength="40" value="{$announcements_show->manager|default:''}" name="manager">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-4">Электронная почта</label>
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Email" value="{$announcements_show->email|default:''}" name="email">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-8">   
                <label  for="allow_mails"> <input type="checkbox" value="1" name="allow_mails" id="allow_mails" {$announcements_show->allow_mails|default:''|replace:1:'checked = ""'} class="form-input-checkbox">
                    <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> </label> <br>
            </div>
        </div>


        <div class="form-group">
            <label for="seller_name" class="col-sm-4"><b>Ваше имя </b></label>
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Ваше имя" maxlength="40"  value="{$announcements_show->seller_name|default:''}" name="seller_name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4">Номер телефона </label>
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Номер телефона" value="{$announcements_show->phone|default:''}" name="phone">       
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4">Город</label> 
            <div class="col-md-8">
                <select class="form-control"   title="Выберите Ваш город"  name="location_id">
                    <option >-- Выберите Ваш город --</option>
                    {html_options options=$location selected=$announcements_show->location_id}
                </select>
            </div>            
        </div>
        <div class="form-group">
            <label class="col-sm-4">Категория</label>
            <div class="col-md-8">
                <select class="form-control" title="Выберите категорию объявления"  name="category_id"> 
                    <option >-- Выберите категорию объявления --</option>
                    {html_options options=$category selected=$announcements_show->category_id}
                </select>
            </div>            
        </div>
        <div class="form-group">
            <label class="col-sm-4">Название объявления</label>
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Название объявления" maxlength="50" value="{$announcements_show->title|default:''}" name="title">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4">Описание объявления</label> 
            <div class="col-md-8">
                <input class="form-control" rows="3" type="text" maxlength="3000" value="{$announcements_show->description|default:''}" name="description">
            </div> 
        </div> 
        <div class="form-group">
            <label class="col-sm-4">Цена</label> 
            <div class="col-md-8">
                <input type="text" class="form-control" maxlength="9" placeholder="Руб." value="{$announcements_show->price|default:''}" name="price">
                <br><br>
            </div>
        </div>
{*        <input type="submit" class="btn btn-default"  value="{$save|default:'Сохранить'}"  name="main_form_submit" class="vas-submit-input">*}
        <input type="button" class="btn btn-default"  value="{$save|default:'Сохранить'}"  name="main_form_submit" class="vas-submit-input">
{*        <td><button type="button" class="btn btn-default">Удалить</button></td>*}
        <br>
    </form>

</body>



{include file='footer.tpl'}
