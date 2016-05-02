myApp.onPageInit('products-create', function (page) {

    var url = $('#base_url').data('value');

    var category_id = $('#category_id').find('option:selected').val();

    new Vue({

        el: '#products-create',

        data: {

            submitted: false,

            choice: 1,

            brands: [
                {
                    id: '',
                    name: ''
                }
            ],

            fields: {
                name: '',
                description: '',
                photo: ''
            },

            products: []
        },

        computed: {
            errors: function () {

                for (var key in this.fields) {
                    if (!this.fields[key]) return true;
                }

                return false;
            }
        },

        ready: function () {

            this.fetchBrands();
            this.fetchNewProducts();


        },

        methods: {
            fetchBrands: function () {
                var category_id = $('#category_id').find('option:selected').val();

                this.$http.get(url + '/get-brands/' + category_id, function (brands) {
                    this.$set('brands', brands);
                    this.choice = brands[0].id;
                });

            },
            fetchNewProducts: function () {

                this.$http.get(url + '/get-new-products', function (products) {
                    this.$set('products', products);
                });
            },

            onSubmitForm: function (e) {

                //prevent default
                e.preventDefault();

                // reset input fields
                this.fields = {
                    name: '', description: ''
                }

                //send post ajax request

                this.$http.post(url + 'brands', fields);

                //show thanks message
                this.submitted = true;

                // hide the submit button

            },

        }
    });


});

//myApp.onPageInit('products-create', function (page) {
//
//    $$(document).on('change', '#category_id', function () {
//        var category_id = $(this).find('option:selected').val();
//        var url = $$(this).attr('data-url') + '/' + category_id;
//        var data = [];
//        data["_token"] = $$('[name="_token"]').val();
//        $$.ajax({
//
//            url: url,
//            type: "GET",
//            data: data,
//            success: function (response) {
//
//                console.log(response);
//
//                var oData = JSON.parse(response);
//
//                new Vue({
//                    el: '#brand_id',
//
//                    data: {
//                        brands: oData
//                    },
//
//                });
//
//                $$('.brand_field').addClass('hide');
//                $$('.brand_field').removeClass('hide');
//
//            }
//        });
//    });
//});