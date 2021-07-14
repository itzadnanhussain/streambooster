<?php  if(isset($records)){ 

foreach ($records as $value){ 
    $array[] = $value->video_path;
    
}
$input = $array;
$rand_keys = array_rand($input, 2);
 $vid= $input[$rand_keys[0]] ;

?>
<style>

.overlay{
    display:none;
}
.container .overlay
{    
    position: absolute;
    top: 20px;
    left: 21px;
    width: 13%;
    height: 40px;
    border: 6px solid gray;
    border-radius:5%;
    z-index: +1;
}
.container .overlay #r
{
        padding-left: 5%;
    padding-top: 10px;
    font-size: 16px;
    color: gray;
    font-weight: bold;
}
.container .overlay #rr
{
        padding-left: 27%;
    padding-top: 1%;
    font-size: 16px;
    color: gray;
    font-weight: bold;
}
</style>


<div style="background:#ffffff; position: fixed; top: 0; width: 100%; height: 100%; z-index: +1;">
   <div class="container">
    <video id="video" onplay="myFunction()" controls="" preload="auto"  style="width:100%; height:100%">
      <source id="mp4" src="<?php echo base_url().$vid; ?>" type="video/mp4">
      <source id="webm" src="<?php echo base_url().$vid; ?>" type="video/webm">
      <source id="ogv" src="<?php echo base_url().$vid; ?>" type="video/ogg">
      
    </video>
    <div class="overlay">
         
        <div><span id="r"></span><a id="rr" href="<?php echo base_url('en/dashboard/getcoins');?>" class="btn" style="display:none">Skip Now</a></div>
    </div>
    </div>
</div>
<?php } ?>


<script>
 function myFunction(){
     $(".overlay").show();
var start=Date.now(),r=document.getElementById('r');
(function f(){
 var diff=Date.now()-start,ns=(((20000-diff)/1000)>>0),m=(ns/60)>>0,s=ns-m*60;
 r.textContent="Ad skip in "+m+':'+((''+s).length>1?'':'0')+s+' sec';
 if(diff>(20000)){start=Date.now()}
 setTimeout(f,1000);
})();
 $("#r").delay(20000).fadeOut();
 $("#rr").delay(21000).fadeIn();
}

/*<![CDATA[*/
  document.querySelector('video').addEventListener('ended',function(){
    window.location.href ="<?php echo base_url('en/dashboard/getcoins');?>";
  }, false);
/*]]>*/
</script>

<script language="javascript">



function preventBack() 
   {
   window.history.forward();

   }
setTimeout("preventBack()", 0);
window.onunload = function () { null };
</script>