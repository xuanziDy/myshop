<?php

/**
 * 根据传入的name和rows生成一个下拉列表的html
 * @param $name    表单元素的名字
 * @param $rows    下拉列表中需要的数据
 */
function arr2selected($name,$rows,$defaultValue,$fieldValue='id',$fieldName='name'){
    $html = "<select name='{$name}' class='{$name}'>
            <option value=''>--请选择--</option>";
    foreach($rows as $row){
        //根据默认值比对每一行,从而生成selected='selected',然后在option中使用.
        $selected  = '';
        if($row[$fieldValue]==$defaultValue){
            $selected = "selected='selected'";
        }
        $html.="<option value='{$row[$fieldValue]}' {$selected}>{$row[$fieldName]}</option>";
    }
    $html.="</select>";
    echo $html;
}