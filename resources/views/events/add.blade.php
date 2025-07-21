<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Event</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register Event Form</h2>
  <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">Title:<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="button_title">Button title:<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="button_title" placeholder="Enter button title" name="button_title">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="start_date">Start Date:<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="start_date" placeholder="Enter start date" name="start_date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="start_time">Start Time:<span class="text-danger">*</span></label>
                <input type="time" class="form-control" id="start_time" placeholder="Enter start time" name="start_time">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="end_date">End Date:<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="end_date" placeholder="Enter end date" name="end_date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="end_time">End Time:<span class="text-danger">*</span></label>
                <input type="time" class="form-control" id="end_time" placeholder="Enter end time" name="end_time">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="flyer">Flyer<span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="flyer" name="flyer">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="status">Status<span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h3>Packages</h3>
            </div>
        </div>
    </div> 

    <!-- class div -->
    <div class="row" style="border: 1px solid #ccc;padding: 5px;">
        <div class="col-md-4">
            <div class="form-group">
                <label for="classes_name">Classes Name<span class="text-danger">*</span></label>
                <input type="hidden" class="form-control" id="total_classes_name" name="total_classes_name">
                <select name="classes_name" id="classes_name" class="form-control classes_name_input_field">
                   @foreach ($class_list as $class)
                       <option value="{{ $class->id }}">{{ $class->title }}</option>
                   @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="class_status">Status<span class="text-danger">*</span></label>
                <select name="class_status" id="class_status" class="form-control class_status_input_field">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary add_more_class">Add More</button>
        </div>
        <div class="col-md-12" id="add_package_div">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="hidden" class="form-control total_packages_input_field_class_1" id="total_packages" name="class_1_total_packages" value="1" data-class="1">
                        <label for="package_name">Package Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control package_name_input_field_class_1" id="package_name" placeholder="Enter package name" name="package_name" data-class="1">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="package_price">Package Price<span class="text-danger">*</span></label>
                        <input type="number" class="form-control package_price_input_field_class_1" id="package_price" placeholder="Enter package price" name="package_price" data-class="1">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="package_status">Package Status<span class="text-danger">*</span></label>
                        <select name="package_status" id="package_status" class="form-control package_status_input_field_class_1" data-class="1">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary add_more_package" data-class-number="1">Add Package</button>
                </div>
            </div>

        </div>
    </div>

    <!-- class div end -->

    <!-- additional div start -->
    <div class="row">
        <div class="col-md-12">
           <h3>Additional</h3>
        </div>
    </div>

    <div id="add_additional_div">
        <div class="row">
            <div class="col-md-3">
            <div class="form-group">
                    <input type="hidden" class="form-control total_additional_input_field" id="total_additional" name="total_additional" value="1">
                    <label for="additional_title">title</label>
                    <input type="text" name="additional_title" id="additional_title" class="form-control additional_title_input_field">
                </div>
            </div>
            <div class="col-md-2 ">
            <div class="form-group">
                    <label for="additional_price">Price</label>
                    <input type="number" name="additional_price" id="additional_price" class="form-control additional_price_input_field">
                </div>
            </div>
            <div class="col-md-2 ">
            <div class="form-group">
                    <label for="additional_index">Index</label>
                    <input type="number" name="additional_index" id="additional_index" class="form-control additional_index_input_field">
                </div>
            </div>
            <div class="col-md-2 ">
            <div class="form-group">
                    <label for="additional_status">Status</label>
                    <select name="additional_status" id="additional_status" class="form-control additional_status_input_field">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
                    <button type="button" class="btn btn-primary add_more_additional">Add More</button>
                </div>
            </div>
        </div>
    </div>
    <!-- additional div end -->

    <!-- transport div start -->
    <div class="row">
        <div class="col-md-12">
           <h3>Transport</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="transport_name">Transport Status<span class="text-danger">*</span></label>
                <select name="transport_status" id="transport_status" class="form-control transport_status_input_field">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select    >
            </div>
        </div>
    </div>

    <div id="add_route_div">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="hidden" class="form-control total_route_input_field" id="total_route" name="total_route" value="1">
                    <label for="route_name">Route Name<span class="text-danger">*</span></label>
                    <input type="text" id="route_name" class="form-control route_name_input_field" name="route_name">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="route_price">Price<span class="text-danger">*</span></label>
                    <input type="number" id="route_price" class="form-control route_price_input_field" name="route_price">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="route_status">Status<span class="text-danger">*</span></label>
                    <select name="route_status" id="route_status" class="form-control route_status_input_field">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <button type="button" class="btn btn-primary add_more_route">Add More</button>
                </div>
            </div>
        </div>
    </div>
    <!-- transport div end -->
    
    
    
    
    <br><br>

    <button type="submit" class="btn btn-success">Register</button>
  </form>
</div>

<div id="clone_package_div" style="display: none;">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="package_name">Package Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control package_name_input_field_class_1"  placeholder="Enter package name" name="package_name">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="package_price">Package Price<span class="text-danger">*</span></label>
                <input type="text" class="form-control package_price_input_field_class_1" placeholder="Enter package price" name="package_price">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="package_status">Package Status<span class="text-danger">*</span></label>
                <select name="package_status"  class="form-control package_status_input_field_class_1">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary remove_package">Remove</button>
        </div>
    </div>
</div>

<div id="clone_additional_div" style="display: none;">
    <div class="row">
        <div class="col-md-3">
           <div class="form-group">
                <label for="additional_title">title</label>
                <input type="text" name="additional_title" class="form-control additional_title_input_field">
            </div>
        </div>
        <div class="col-md-2">
           <div class="form-group">
                <label for="additional_price">Price</label>
                <input type="number" name="additional_price" class="form-control additional_price_input_field">
            </div>
        </div>
        <div class="col-md-2">
           <div class="form-group">
                <label for="additional_index">Index</label>
                <input type="number" name="additional_index" class="form-control additional_index_input_field">
            </div>
        </div>
        <div class="col-md-2 ">
           <div class="form-group">
                <label for="additional_status">Status</label>
                <select name="additional_status" class="form-control additional_status_input_field">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
           <div class="form-group">
                <button type="button" class="btn btn-primary remove_additional">Remove</button>
            </div>
        </div>
    </div>
</div>

<div id="clone_roote_div" style="display:none">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="route_name">Route Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control route_name_input_field" name="route_name">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="route_price">Price<span class="text-danger">*</span></label>
                <input type="text" class="form-control route_price_input_field" name="route_price">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="route_status">Status<span class="text-danger">*</span></label>
                <select name="route_status" class="form-control route_status_input_field">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <button type="button" class="btn btn-primary remove_route">Remove</button>
            </div>
        </div>
    </div>
</div>

<script>

    function change_id_name_input_fields(){
        var total_classes_name = $(".classes_name_input_field").length;
        $("#total_classes_name").val(total_classes_name);

        $(".classes_name_input_field").each(function(i) {
            $(this).attr('name', 'classes_name_' + (i+1));
        });
        $(".class_status_input_field").each(function(i) {
            $(this).attr('name', 'class_status_' + (i+1));
        });
    }

    function change_id_name_input_fields_packages(){
        var total_classes_name = $(".classes_name_input_field").length;

        for(var i = 1; i <= total_classes_name; i++){
           var total_packages = $(".total_packages_input_field_class_" + i).val();

          // console.log(total_packages);
           for(var j = 1; j <= total_packages; j++){
               $(".package_name_input_field_class_" + i).each(function(k) {
                   $(this).attr('name', 'class_' + (i) + '_package_name_' + (j));
               });
               $(".package_price_input_field_class_" + i).each(function(k) {
                   $(this).attr('name', 'class_' + (i) + '_package_price_' + (j));
               });
               $(".package_status_input_field_class_" + i).each(function(k) {
                   $(this).attr('name', 'class_' + (i) + '_package_status_' + (j));
               });
            }
       }
    }

    function change_id_name_input_fields_additional(){
        // var total_additional = $(".additional_title_input_field").length;
        // $("#total_additional").val(total_additional);

        $(".additional_title_input_field").each(function(i) {
            $(this).attr('name', 'additional_title_' + (i+1));
        });
        $(".additional_price_input_field").each(function(i) {
            $(this).attr('name', 'additional_price_' + (i+1));
        });
        $(".additional_index_input_field").each(function(i) {
            $(this).attr('name', 'additional_index_' + (i+1));
        });
        $(".additional_status_input_field").each(function(i) {
            $(this).attr('name', 'additional_status_' + (i+1));
        });
    }

    function change_id_name_input_fields_route(){
        // var total_route = $(".route_name_input_field").length;
        // $("#total_route").val(total_route);

        $(".route_name_input_field").each(function(i) {
            $(this).attr('name', 'route_name_' + (i+1));
        });
        $(".route_price_input_field").each(function(i) {
            $(this).attr('name', 'route_price_' + (i+1));
        });
        $(".route_status_input_field").each(function(i) {
            $(this).attr('name', 'route_status_' + (i+1));
        });
    }

    $(document).ready(function() {
        change_id_name_input_fields();
        change_id_name_input_fields_packages();
        change_id_name_input_fields_additional();
        change_id_name_input_fields_route();
    });

    $(document).on('click', '.add_more_package', function() {
       var class_number = $(this).data('class-number');
       var clone_package_div = $("#clone_package_div").html();
       $("#add_package_div").append(clone_package_div);

       var next_total_packages = parseInt($(".total_packages_input_field_class_" + class_number).val()) + 1;
       $(".total_packages_input_field_class_" + class_number).val(next_total_packages);
       change_id_name_input_fields_packages();
    });

    $(document).on('click', '.remove_package', function() {
       $(this).parent().parent().remove();
       
       var  next_total_packages = parseInt($(".total_packages_input_field_class_1").val()) - 1;
       $(".total_packages_input_field_class_1").val(next_total_packages);
       change_id_name_input_fields_packages();
    });

    $(document).on('click', '.add_more_additional', function() {
       var additional_number = $(this).data('additional-number');
       var clone_additional_div = $("#clone_additional_div").html();
       $("#add_additional_div").append(clone_additional_div);

       var next_total_additional = parseInt($(".total_additional_input_field").val()) + 1;
       $(".total_additional_input_field").val(next_total_additional);
       change_id_name_input_fields_additional();
    });

    $(document).on('click', '.remove_additional', function() {
       $(this).parent().parent().parent().remove();
       var next_total_additional = parseInt($(".total_additional_input_field").val()) - 1;
       $(".total_additional_input_field").val(next_total_additional);
       change_id_name_input_fields_additional();

    });

    $(document).on('click', '.add_more_route', function() {
       var clone_route_div = $("#clone_roote_div").html();
       $("#add_route_div").append(clone_route_div);

       var next_total_route = parseInt($(".total_route_input_field").val()) + 1;
       $(".total_route_input_field").val(next_total_route);
       change_id_name_input_fields_route();
    });

    $(document).on('click', '.remove_route', function() {
       $(this).parent().parent().parent().remove();
       var next_total_route = parseInt($(".total_route_input_field").val()) - 1;
       $(".total_route_input_field").val(next_total_route);
       change_id_name_input_fields_route();
    });

    $(document).on('change', '#transport_status', function() {
        if($(this).val() == 'active') {
            $("#add_route_div").show();
        } else {
            $("#add_route_div").hide();
        }
    })
</script>
</body>
</html>
