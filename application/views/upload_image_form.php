<html>
  <head> 
      <title>Image Upload Example from Scratch</title>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="http://malsup.github.com/jquery.form.js"></script>
  </head>
  <body> 

      <?php echo form_open_multipart('upload-image-using-ajax/post');?> 
         <input type="file" name="file" size="20" />
         <input type="submit" class="btn-image-upload" value="upload" /> 
      </form> 
      <div class="preview" style="display: none;">
        <img src="">
      </div>

   <script type="text/javascript">
      $("body").on("click",".btn-image-upload",function(e){
       $(this).parents("form").ajaxForm(options);
      });


     var options = { 
       complete: function(response) 
       {
         if($.isEmptyObject(response.responseJSON.error)){
            alert('Image Upload Successfully.');
            $(".preview").css("display","block");
            $(".preview").find("img").attr("src","./images/"+response.responseJSON.success);
         }else{
            alert(response.responseJSON.error);
         }
       }
     };

   </script>
  </body>
</html>
