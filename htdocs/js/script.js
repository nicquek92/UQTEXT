$(function () {

    /** Load Index **/
//if session['shopping cart'] is set then btn-add-to-cart, shopping badge, and total
// price will change
    load_index();
    function load_index() {
        //first get the session with ajax aka jQuery getJSON
        $.getJSON("Get_Session.php", function (data) {
            console.log(data);
            if (data == null) {
                console.log("LOAD NORMALLY");
            } else {
                console.log("LOAD with session");
                var total = 0;
                var badge = 0;
                $.each(data, function (key, value) {
                    console.log(value.quantity);
                    total += parseFloat(value.price)*parseInt(value.quantity);
                    badge++;
                    $('#' + value.id).parent().hide();
                    $('#remove' + value.id).parent().show();

                });

                $('.badge').html(badge);
                $('.total_price').html("$" + total);
            }
        })
    }

    /** add to cart **/
//click btn-add-to-cart
// get value from relative fields
// its id,title,author,price will be add to session['shopping cart']


    $('.btn-add-to-cart').click(function () {
        var id = $(this).attr('id');
        $('#' + id).parent().hide();
        $('#remove' + id).parent().show();
        var title = $('#book_title' + id).val();
        var image = $('#book_image' + id).val();
        var author = $('#book_author' + id).val();
        var price = $('#book_price' + id).val();
        var desc = $('#book_desc' + id).val();
        var quantity=$('#book_quantity'+id).val();
        console.log(title);
        $.ajax({
            url: "Insert_Session.php",
            method: "POST",
            data: {
                id: id,
                title: title,
                author: author,
                price: price,
                quantity:quantity,
                desc: desc,
                image:image
                          },
            dataType: "json",
            success: function (data) {

                var total = 0;
                var badge = 0;
                    $.each(data, function (key, value) {
                        console.log(value.quantity);
                        total += parseFloat(value.price)*parseInt(value.quantity);
                        badge++;
                    });
                $('.badge').html(badge);
                $('.total_price').html("$" + total);
            }
        })
    })
    /** Remove from cart **/
//remove click item array from session['shopping cart'][]
//decrease the badge, total price and change btn-add-to-cart back

    $('.btn-remove-from-cart').click(function () {
        var id = parseInt($(this).attr('name'));
        console.log(id);
        $('#' + id).parent().show();
        $('#remove' + id).parent().hide();

        $.ajax({
            url: "Delete_Session.php",
            method: "POST",
            data: {
                id: id
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                var total = 0;
                var badge = 0;
                $.each(data, function (key, value) {
                    console.log(value.quantity);
                    total += parseFloat(value.price)*parseInt(value.quantity);
                    badge++;
                });
                $('.badge').html(badge);
                $('.total_price').html("$" + total);
            }
        })
    })
    /** Checkout Icon onclick **/
    $('#checkout_btn').click(function () {
        if ($('.badge').html() > 0) {
            window.location.href = "checkout.php";
        } else {
            alert("No items in cart");
        }
    });

        /***************** Sign Up Form Validation ******************/
    //terms and condition check
    $('#btn-signup').attr('disabled', 'disabled');
    $('#terms').change(function () {
        if (this.checked) {
            $('#btn-signup').removeAttr('disabled');
        } else {
            $('#btn-signup').attr('disabled', 'disabled');
        }
    });

    //get JSON data of users' emails
    var items = [];
    $.getJSON('/helpers/get_email.php', function (data) {
        $.each(data, function (key, val) {
            items.push(val);
        });
    });
    //add method to the JQuery validator to check if email is already exist?
    $.validator.addMethod('check_email', function (value) {
        for (var i = 0; i < items.length; i++) {
            if (items[i].customer === value) {
                return false;
            }
        }
        return true;
    });
    $('#signupform').validate({
        rules: {
            firstname: "required",
            lastname: "required",
            email: {
                required: true,
                email: true,
                check_email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: {
                email: "Please enter a valid email address",
                check_email: "An account is already created with this email." +
                "<a>Forgot Password?</a>"
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    /*************************** ADD TO CART **************************/
    $('#peek_btn').click(function () {
        if ($('#mySidenav').width() == 0) {
            $('#mySidenav').width("25%");
        } else {
            $('#mySidenav').width("0px");
        }
        $('.sidenav').click(function () {
            $('#mySidenav').width("0px");
        })
        

        
        
        
        
        
        
        
        
        
        
        
        

    });

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    /*************************** ADMIN CRUD **************************/
    $('#update_admin').click(function () {

        $('#admin_username').html("Old Username");
        $('.admin_new').show();
        $('#add_btn').hide();
        $('#update_btn').show();
        $('#delete_btn').hide();
        $('.admin_password').hide();

    });

    $('#add_admin').click(function () {

        $('#admin_username').html("Username");
        $('.admin_password').show();
        $('.admin_new').hide();
        $('#add_btn').show();
        $('#update_btn').hide();
        $('#delete_btn').hide();
    });
    $('#delete_admin').click(function () {

        $('#admin_username').html("Username");
        $('.admin_new').hide();
        $('#add_btn').hide();
        $('#update_btn').hide();
        $('#delete_btn').show();
        $('.admin_password').hide();

    });
    /******************** Admin CRUD ***********************/
    $('#admin_crud_form').validate({
        rules: {
            admin_username: "required",
            admin_pass: "required",
            admin_new_username: "required",
            admin_new_pass: "required",

        },

        submitHandler: function (form) {
            form.submit();
        }
    });


    /******************* Book CRUD ************************/
//search book data and fill in upload form
    $('#fillBookData').click(function () {
        bookObjectArray.length = 0;
        $('#selectBook option').remove();
        bookSearch();
    })
//get book from google apis using ajax
    var bookObjectArray = [];

    function bookSearch() {
        var search = $('#searchBook').val();
        $.ajax({
            url: "https://www.googleapis.com/books/v1/volumes?q=" + search,
            type: 'GET',
            dataType: "json",
            success: function (data) {

                for (var i = 0; i < data.items.length; i++) {
                    //many books data will be retrieve
                    //put those in select drop down box
                    $('#selectBook').append('<option value="' + i + '">' + data.items[i].volumeInfo.title + '</option>');
                    //add all the data to bookObjectArray
                    bookObjectArray.push(data.items[i])
                }
                if ("volumeInfo" in bookObjectArray[0]) {
                    showVolumeInfo(bookObjectArray[0].volumeInfo);
                }
                //check if there's listPrice key in bookObjectArray.saleInfo
                if ("listPrice" in bookObjectArray[0].saleInfo) {
                    showSalesInfo(bookObjectArray[0].saleInfo);
                } else {
                    $('#original_price').val("0")
                }
            },
        })
    }

    function showVolumeInfo(searchData) {
        $('#isbn').val(searchData.industryIdentifiers[0].identifier);
        $('#title').val(searchData.title);
        $('#image_src').val(searchData.imageLinks.thumbnail)
        $('#image').attr('src', searchData.imageLinks.thumbnail);
        $('#author').val(searchData.authors);

        $('#rating').val(searchData.averageRating);
        if (!$('#rating').val() > 0) {
            $('#rating').val(0);
        }
    }

    function showSalesInfo(searchData) {
        $('#original_price').val(searchData.listPrice.amount);
    }


    $('#selectBook').change(function () {
        if ("volumeInfo" in bookObjectArray[$('#selectBook').val()]) {
            showVolumeInfo(bookObjectArray[$('#selectBook').val()].volumeInfo);
        }
        if ("listPrice" in bookObjectArray[$('#selectBook').val()].saleInfo) {
            showSalesInfo(bookObjectArray[$('#selectBook').val()].saleInfo);
        } else {
            $('#original_price').val("0")
        }


    });


    $('#bookform').validate({
        rules: {
            title: "required",
            isbn: "required",
            original_price: {
                required: true,
                number: true
            },
            rating: {
                required: true,
                number: true,
                maxlength: 3
            },
            price: {
                required: true,
                number: true
            },
            image: "required",
            quantity: {
                required: true,
                digits: true,
                maxlength: 5
            },
            course_tags: "required",
            description: "required"
        },

        submitHandler: function (form) {
            form.submit();
        }
    });

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
                $('#image_src').val("0");
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileSelect").change(function () {
        readURL(this);
    });

//click add_btn_book , update_btn_book, delete_btn_book
//show add_book,
    $('#update_book').hide();
    $('#delete_book').hide();
    $('#add_btn_book').click(function () {
        $('#add_book').show();
        $('#update_book').hide();
        $('#delete_book').hide();
         $('#searchforbookdetail').show();
    })
    $('#update_btn_book').click(function () {
        $('#add_book').hide();
        $('#update_book').show();
        $('#delete_book').hide();
        $('#searchforbookdetail').hide();
     
    })
    $('#delete_btn_book').click(function () {
        $('#add_book').hide();
        $('#update_book').hide();
        $('#delete_book').show();
    })


});


