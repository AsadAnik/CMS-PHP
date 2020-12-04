///This is the Custom JavaScript for this Application...
//Check Posts Check All Checkput Input then it makes all checked instandly..
$(document).ready(function(){
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
});