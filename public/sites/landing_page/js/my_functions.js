/*::::::::::::::::::::::::::::::::::::::::::::::::: 
               Admin Functions
:::::::::::::::::::::::::::::::::::::::::::::::::*/

/*::::::::::::::::::::::::::::::::::::::::::::::::: 
               Site Functions
:::::::::::::::::::::::::::::::::::::::::::::::::*/
//+++++on load

//++++++++++++on ready
$(document).ready(function(){

    //fill dayra select box
    $('select[name="wilaya"]').on('change',function(){
        //get wilaya id
        var wilaya_id=$(this).val();
        //send request to getdayras route
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.open("get","/getdayras/"+wilaya_id,false);
        xmlhttp.send(null);
        //get responce of dayras
        //print it in html
        if(xmlhttp.responseText!='null')
         {
             $('#dayra').show();
        document.getElementById('dayra').innerHTML=xmlhttp.responseText;
         }
    });
    
    
});
//+++++++++++end on ready+++++++
//+++++++++++start functions+++++++
//function to fill baladia dropbox
function changebaladia()
{
    var dayra_id=parseInt(document.getElementById('select_dayra').value);
    //send request to getdayras route
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.open("get","/getbaladias/"+dayra_id,false);
    xmlhttp.send(null);
    //get responce of dayras and print it in html
    if(xmlhttp.responseText!='null')
    {
    $('#baladia').show();
    document.getElementById('baladia').innerHTML=xmlhttp.responseText;
    }
}
//function to detecte type of real estate
function real_estate_detector()
{
    //detect option value
    var type=$("#r_e_type").val();
    /*
    type= 0 -no thing
    type= 1 - apartment شقة
    type= 2 - house منزل
    type= 3 - studio ستيديو
    type= 4 - farm مزرعة
    type= 5 - land أرض
    type= 6 - shop محل
    type= 7 - bereau مكتب
    */
    //if statment to run the right function to show options
    if(type==1)
    {
        show_apartment()      
    }else if(type==2)
    {
        show_house()        
    }else if(type==3)
    {
        show_studio()   
    }else if(type==4)
    {
        show_farm()    
    }else if(type==5)
    {
        show_land()  
    }else if(type==6)
    {
        show_shop()
    }else
    {
        //hide all options
    }
}
//function to show apartment option
function show_apartment()
{
    //hide all options
    hide_all_real_estate_options();
    //show option for apartment
    $('.apartment_option').show();
}
//function to show house option
function show_house()
{
    //hide all options
    hide_all_real_estate_options();
    //show option for apartment
    $('.house_option').show();  
}
//function to show studio option
function show_studio()
{
    //hide all options
    hide_all_real_estate_options();
    //show option for apartment
    $('.studio_option').show();
}
//function to show Farm option
function show_farm()
{
    //hide all options
    hide_all_real_estate_options();
    //show option for apartment
    $('.farm_option').show();
}
//function to show land option
function show_land()
{
    //hide all options
    hide_all_real_estate_options();
    //show option for apartment
    $('.land_option').show();
}
//function to show Shop option
function show_shop()
{
    //hide all options
    hide_all_real_estate_options();
    //show option for apartment
    $('.shop_option').show();  
}

function hide_all_real_estate_options()
{
    $('.apartment_option').hide(); 
    $('.house_option').hide();
    $('.studio_option').hide();
    $('.farm_option').hide();
    $('.land_option').hide();
    $('.shop_option').hide();
}
// function show_old_options()
// {
//     var h_r_e_type=document.getElementById('h_r_e_type').value;
//     var h_rooms=document.getElementById('h_rooms').value;
//     var h_etage=document.getElementById('h_etage').value;
//     var h_facad=document.getElementById('h_facad').value;
//     var h_eatge_number=document.getElementById('h_etage_number').value;
//     var h_furnished=document.getElementById('h_furnished').value;
//     var h_bathes=document.getElementById('h_bethes').value;
//     var h_properties=document.getElementById('h_properties').value;
//     var h_tronsaction=document.getElementById('h_tronsaction').value;
//     var h_wilaya=document.getElementById('h_wilaya').value;
//     var h_dayra=document.getElementById('h_dayra').value;
//     var h_baladia=document.getElementById('h_baladia').value;
//     //alert('hi');
    
// }

//+++++++++end functions+++++++++++

