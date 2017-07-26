<div class="container-padding">
  <div class="row">
    <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">
        <div class="panel-title">          
        </div>
            <div class="panel-body">
              <?php echo form_open('') ?>
                <div class="form-group">
                  <label for="input1" class="form-label">Email Admin</label>
                  <input type="email" name="email" class="form-control" id="input1" value="">
                </div>
                     
                <button type="submit" value="1" name="change-user" class="btn btn-default">Submit</button>
              </form>
            </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">
        <div class="panel-title">          
        </div>
            <div class="panel-body">
              <?php echo form_open('') ?>
                <div class="form-group">
                  <label for="input1" class="form-label">Password</label>
                  <input type="password" name="password_now" class="form-control" id="input1">
                </div>
                <div class="form-group">
                  <label for="input2" class="form-label">New Password</label>
                  <input type="password" class="form-control" id="input2" name="password_new">
                </div>
                <div class="form-group">
                  <label for="input3"  class="form-label">Confirmation Password</label>
                  <input type="password" class="form-control" id="input3" name="password_confirmation">
                </div>              
                <button type="submit" value="1" name="change" class="btn btn-default">Submit</button>
              </form>
            </div>
      </div>
    </div>
  </div>
</div>