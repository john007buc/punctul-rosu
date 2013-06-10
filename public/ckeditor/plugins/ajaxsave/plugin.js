 /**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 10/23/12
 * Time: 11:54 AM
 * To change this template use File | Settings | File Templates.
 */
/*
CKEDITOR.plugins.add('ajaxsave',
    {
        init: function(editor)
        {
            var pluginName = 'ajaxsave';
            editor.addCommand( pluginName,
                {
                    exec : function( editor )
                    {

                      // alert("trimit acum");
                        $.post("add_news.php", {data : editor.getSnapshot()},function(data){


                            var now = new Date();
                            var timeStr = now.getHours()+':'+now.getMinutes()+':'+now.getSeconds();
                            $("#status-bar").html("Last updated: " +timeStr);


                        });

                        var now = new Date();
                        var timeStr = now.getHours()+':'+now.getMinutes()+':'+now.getSeconds();
                        $("#status-bar").html("Last updated: " +timeStr);

                    },
                    canUndo : true
                });
            editor.ui.addButton('ajaxsave',
                {
                    label: 'mue miu',
                    command: pluginName,
                    //className : 'cke_button_save'
                });
        }
    });
    */
 (function () {
     CKEDITOR.plugins.add('ajaxsave', {init:function (editor)
     {
         editor.addCommand('ajaxsave', {exec:function (editor) {
            // var timestamp = new Date();
             //editor.insertHtml('The current date and time is: <em>' + timestamp.toString() + '</em>');
             //alert(editor.getSnapshot());
             //var data=editor.getSnapshot()
             //saveEditorData(editor.getSnapshot());
             var data=editor.getData();
             saveEditorData(editor.getData());
         }});
         editor.ui.addButton && editor.ui.addButton('ajaxsave', {label:'mue miu', command:'ajaxsave', icon:this.path + 'newplugin.png'});
     }
     });
 })();