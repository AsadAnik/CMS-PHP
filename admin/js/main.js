///This is the Custom JavaScript for this Application...
//Check Posts Check All Checkput Input then it makes all checked instandly..
$(document).ready(function(){
    ///Multiple Selection with checkbox...
    $('#selectAllBoxes').click(function(event){
        if(this.checked){
            $('.checkboxes').each(function(){
                this.checked = true;
            });
        }else{
            $('.checkboxes').each(function(){
                this.checked = false;
            });
        }
    });

    ///Loader Of Admin page...
    var loader = "<div id='load-screen'><div id='loading'></div></div>";
    $("body").prepend(loader);

    $('#load-screen').delay(700).fadeOut(600, function(){
        $(this).remove();
    });
});