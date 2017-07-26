<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{    
    function col_label(){
        return "2";
    }
    function col_form(){
        return "8";
    }
    function open_bootstrap(){
        return "
            <?php
            if (!defined('BASEPATH'))
              exit('No direct script access allowed');
            ?>
            <div class='container-default'>
              <div class='row'>
                  <div class='col-md-12'>
                    <div class='panel panel-default'>
                      <div class='panel-title'>
                        <ul class='panel-tools'>
                          <li><a class='icon minimise-tool'><i class='fa fa-minus'></i></a></li>
                          <li><a class='icon expand-tool'><i class='fa fa-expand'></i></a></li>              
                        </ul>
                      </div>
                      <div class='panel-body'>
        ";
    }
    function close_bootstrap(){
        return "
                </div>
              </div>
          </div>
        </div>
        ";
    }
    function t_text($label,$name,$value="",$id=""){
        return
            "
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                    <div class='col-sm-".col_form()."'>
                        <input type='text' class='form-control' id='".$id."' name='".$name."' value='".$value."' >           
                        <span class='help-block'></span>
                    </div>                            
            </div>

            ";
    }
     function t_text_read_only($label,$name,$value="",$id=""){
        return
            "
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                    <div class='col-sm-".col_form()."'>
                        <input type='text' class='form-control' id='".$id."' name='".$name."' value='".$value."' readonly>           
                        <span class='help-block'></span>
                    </div>                            
            </div>

            ";
    }
    function t_hidden($label,$name,$value="",$id=""){
        return
            "
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                    <div class='col-sm-".col_form()."'>
                        <input type='hidden' class='form-control' name='".$name."' value='".$value."' id='".$id."'>           
                        <span class='help-block'></span>
                    </div>                            
            </div>

            ";
    }
    function t_static($label,$value=""){
      return "
           <div class='form-group'>
                  <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                  <div class='col-sm-".col_form()."'>
                    <p class='form-control-static'>".$value."</p>
                  </div>
                </div>
      ";
    }
    function t_email($label,$name,$value=""){
        return
            "
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                    <div class='col-sm-".col_form()."'>
                        <input type='email' class='form-control' id='input002' name='".$name."' value='".$value."'>           
                        <span class='help-block'></span>
                    </div>                            
            </div>

            ";
    }
     function t_password($label,$name,$value=""){
        return
            "
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                    <div class='col-sm-".col_form()."'>
                        <input type='password' class='form-control' id='input002' name='".$name."' value='".$value."' required>           
                        <span class='help-block'></span>
                    </div>                            
            </div>

            ";
    }
    function t_number($label,$name,$value=""){
        return
            "
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                    <div class='col-sm-3'>
                        <input type='number' class='form-control' id='input002' name='".$name."' value='".$value."'>           
                        <span class='help-block'></span>
                    </div>                            
            </div>

            ";
    }
    function t_file($label,$name,$req="",$display="",$id=""){
        return
            "
            <div class='form-group' style='display:".$display."'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                    <div class='col-sm-".col_form()."'>
                        <input type='file'  id='".$id."' name='".$name."' ".$req.">           
                        <span class='help-block'></span>
                    </div>                            
            </div>

            ";
    }
    function t_textarea($label,$name,$value=""){
        return
            "
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                    <div class='col-sm-".col_form()."'>                        
                        <textarea name='".$name."' class='form-control'>".$value."</textarea>           
                        <span class='help-block'></span>
                    </div>                            
            </div>

            ";
    }
    function t_editor($label,$name,$value="",$id="",$notif=""){
        return
            "
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label." ".$notif."</label>
                    <div class='col-sm-".col_form()."'>                        
                        <textarea class='form-control ckeditor' rows='3' id='".$id."' name='".$name."' placeholder=''>".$value."</textarea>
                    </div>                            
            </div>
            <script src='".base_url()."asset/plugins/ckeditor/ckeditor.js'></script>
            ";
    }
    function t_line($label,$name,$value=""){
        return "
             <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                <div class='col-sm-".col_form()."'>     
                  <input type='text' class='form-control form-control-line' name='".$name."' value='".$value."'>
                </div>
              </div>
        ";
    }

    function t_radio($label,$name,$value_a="",$value_b="",$label_a="",$label_b=""){
        return "
              <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                <div class='col-sm-3'>
                  <div class='radio radio-info radio-inline'>
                    <input type='radio' id='inlineRadio1' value='".$value_a."' name='".$name."' required>
                    <label for='inlineRadio1'>".$label_a."</label>
                  </div>
                  <div class='radio radio-inline'>
                    <input type='radio' id='inlineRadio2' value='".$value_b."' name='".$name."' required>
                    <label for='inlineRadio2'>".$label_b."</label>
                  </div>
                </div>
              </div>
        ";
    }
    function t_radio_select($label,$name,$value_a="",$value_b="",$label_a="",$label_b="",$select){
        if ($select=='1') {
          return "
              <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                <div class='col-sm-3'>
                  <div class='radio radio-info radio-inline'>
                    <input type='radio' id='inlineRadio1' value='".$value_a."' name='".$name."' checked>
                    <label for='inlineRadio1'>".$label_a."</label>
                  </div>
                  <div class='radio radio-inline'>
                    <input type='radio' id='inlineRadio2' value='".$value_b."' name='".$name."'>
                    <label for='inlineRadio2'>".$label_b."</label>
                  </div>
                </div>
              </div>
          ";
        }
        else{
          return "
              <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                <div class='col-sm-3'>
                  <div class='radio radio-info radio-inline'>
                    <input type='radio' id='inlineRadio1' value='".$value_a."' name='".$name."' >
                    <label for='inlineRadio1'>".$label_a."</label>
                  </div>
                  <div class='radio radio-inline'>
                    <input type='radio' id='inlineRadio2' value='".$value_b."' name='".$name."' checked>
                    <label for='inlineRadio2'>".$label_b."</label>
                  </div>
                </div>
              </div>
          "; 
        }
        
    }
    function t_calendar($label,$name,$id,$value=""){
        return "
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                <div class='col-sm-4'>
                  <fieldset>
                    <div class='control-group'>
                      <div class='controls'>
                       <div class='input-prepend input-group'>
                         <span class='add-on input-group-addon'><i class='fa fa-calendar'></i></span>
                         <input type='text' id='".$id."' name='".$name."' class='form-control' value='".$value."'/> 
                       </div>
                     </div>
                   </div>
                 </fieldset> 
               </div>                  
             </div> 

             <script type='text/javascript'>
              $(document).ready(function() {
                $('#".$id."').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
                  console.log(start.toISOString(), end.toISOString(), label);
                });
              });
            </script> 
        ";
    }

    function t_select($label,$name,$id,$options,$value=""){       
        return"
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                <div class='col-sm-3'>
                  ".form_dropdown_search($name, $options, $value,'', $id)."
                </div>                   
              </div>
        ";
    }
    function t_select_select($label,$select_select){       
        return"
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                <div class='col-sm-3'>
                  ".$select_select."
                </div>                   
              </div>
        ";
    }
    function t_submit($label,$name,$value="",$id=""){
        return
            "
            <div class='form-group'>
                <label class='col-sm-".col_label()." control-label form-label'>".$label."</label>
                    <div class='col-sm-".col_form()."'>
                        <input type='submit' name='".$name."' class='btn btn-default' value='".$value."' id='".$id."'>       
                        <span class='help-block'></span>
                    </div>                            
            </div>

            ";
    }
   
    function tooltip($title,$popup){
      return "<br><span class='mini'>
<a href='#' data-toggle='tooltip' title='".$popup."'>".$title."</a>
</span>";
    }  
    function tooltip_for_ckeditor(){
      return tooltip("Cara edit?","Bisa dibuka di dokumentasi Bootstrap dengan cara menambahkan class di dalam salah satu tag di menu Source dalam CKEditor. eg: class=btn btn-primary (*gunakan petik)");
    } 
    
    

}