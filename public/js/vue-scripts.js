Vue.http.headers.common['X-CSRF-TOKEN'] = $('#_token').attr('value');
var url = $('#base_url').data('value');

myApp.onPageInit('index', function () {

    var ptrContent = $$('.pull-to-refresh-content');

    ptrContent.on('refresh', function (e) {
        setTimeout(function () {
            location.reload();
        }, 1000);
    });
});
myApp.onPageInit('items-create', function () {

    new Vue({

        el: '#items',

        data: {

            metas: [],

            submitted: false,

            fields: {
                name: '',
                price: '',
                photo: ''
            }
        },


        ready: function () {

            this.fetchMetas();

        },

        computed: {
            errors: function () {

                for (var key in this.fields) {
                    if (!this.fields[key]) return true;
                }

                return false;
            }
        },

        methods: {

            fetchMetas: function () {

                //get request
                //this.$http.get(url + '/metas', function (metas) {
                //    this.$set('metas', metas);
                //});

            },

            pushTag: function () {

                this.metas.push($('#meta').val());

                $('#meta').val('');

            },

            onSubmitForm: function (e) {

                var fd = new FormData(document.querySelector('form'));

                $('#photo').val('');

                this.$http.post(url + '/items', fd);

                this.submitted = true;

                this.fields = {
                    name: '', description: '', photo: ''
                }

            },

            onFileChange: function (e) {

                var files = e.target.files || e.dataTransfer.files;
                if (!files.length) {

                }

                this.fields.photo = files;
                console.log(files);

            },


        }

    });

});
myApp.onPageInit('items-show', function () {
    new Vue({
        el: '#items',
        data: {
            items: [],
            search: '',
            added: false
        },
        ready: function () {
            this.fetchItems();
        },
        methods: {
            fetchItems: function () {

                this.$http.get(url + '/fetchAllItems', function (items) {
                    this.$set('items', items);
                });
            },
            onDelete: function (e) {
                var id = e.data('id');
                this.$http.delete(url + '/items/' + id);
            },
            onAddToCart: function (item) {

                this.$http.get(url + '/carts-items/' + item.id, function (response) {
                    this.added = true;
                });
            },
            close: function () {
                this.added = false;
            }
        }
    });
});
myApp.onPageInit('carts-show', function () {

    var vm = new Vue({
        el: '#carts',

        data: {
            items: [],
            cleared: false
        },

        ready: function () {

            this.fetchCartItems();

        },
        methods: {
            fetchCartItems: function () {

                this.$http.get(url + '/get-cart-items').then(function (items) {
                    this.items = items.data;
                });

            },
            clearCart: function () {
                this.$http.get(url + '/carts-clear').then(function (response) {
                    this.cleared = true;
                    this.items = '';
                });
            },

            onAddQty: function (item) {
                this.$http.get(url + '/carts-items/' + item.id, function (response) {
                    this.fetchCartItems();
                });
            },
            onReduceQty: function (item) {
                this.$http.get(url + '/carts-items-decrease/' + item.identifier, function (response) {
                    this.fetchCartItems();
                });
            },
            close: function () {
                this.cleared = false;
            }
        }
    });
});
myApp.onPageInit('product-items', function () {


    var mySwiper = myApp.swiper('.swiper-container', {
        pagination: '.swiper-pagination'
    });

    var oItems = $('#items').data('object');

    new Vue({
        el: '#items',
        data: {
            items: [],
            search: '',
        },
        ready: function () {
            this.items = oItems;


        }
    });


});
myApp.onPageInit('search-products', function () {
    //
    //
    //new Vue({
    //    el: '#search-products',
    //    data: {
    //        products: [],
    //        search: ''
    //    },
    //    ready: function () {
    //
    //        this.fetchProducts();
    //
    //        this.products = $('#search-products').data('object');
    //    },
    //    methods: {
    //
    //        fetchProducts: function () {
    //
    //            this.$http.get(url + '/fetch-products/' + category_name + '/' + brand_name, function (products) {
    //                this.$set('products', products);
    //            });
    //
    //        },
    //
    //        deleteProduct: function (product) {
    //
    //            var that = this;
    //            this.$http.delete(url + '/products/' + product.id, function (response) {
    //                //delete from the list
    //                console.log(response);
    //                that.products.$remove(product);
    //            });
    //        }
    //    }
    //});
});
myApp.onPageInit('products-show', function () {

    var oProducts = $('#all-products').data('object');

    new Vue({
        el: '#all-products',
        data: {
            products: oProducts,
            search: ''
        },
        ready: function () {
        },
        methods: {
            deleteProduct: function (e) {
                e.preventDefault();
                console.log(e);
                this.$http.delete(url + '/products/' + product_id, function () {
                    //delete from the list
                });
            }
        }
    });
});
myApp.onPageInit('products-create', function () {

    var mySwiper3 = myApp.swiper('.swiper-3', {
        pagination: '.swiper-3 .swiper-pagination',
        spaceBetween: 10,
        slidesPerView: 3
    });
    var category_id = $('#category_id').find('option:selected').val();
    new Vue({
        el: '#products-create',
        data: {
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
            products: [],
            submitted: false,
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
            onFileChange: function (e) {

                var files = e.target.files || e.dataTransfer.files;
                if (!files.length) {

                }

                this.fields.photo = files;
                console.log(files);

            },

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

                e.preventDefault();

                var fd = new FormData(document.querySelector('form'));

                $('#photo').val('');

                var fields = this.fields;

                this.$http.post(url + '/products', fd);

                this.submitted = true;

                this.fields = {
                    name: '', description: '', photo: ''
                }
            },
        }
    });
});
myApp.onPageInit('categories-create', function () {

    var vm = new Vue({
        el: '#categories',

        data: {

            categories: [],

            fields: {
                name: ''
            },

            submitted: false
        },

        ready: function () {
            this.fetchCategories();
        },

        computed: {
            errors: function () {

                for (var key in this.fields) {
                    if (!this.fields[key]) return true;
                }

                return false;
            }
        },

        methods: {

            fetchCategories: function () {

                this.$http.get(url + '/categories', function (categories) {
                    console.log(categories);
                    this.$set('categories', categories);
                });

            },

            onSubmitForm: function (e) {
                e.preventDefault();

                var fd = new FormData(document.querySelector('form'));


                this.$http.post(url + '/categories', fd, function (response) {
                    $('#category-list').append('<li>' + response + '</li>');
                    $('#name').val('');
                });

                this.submitted = true;

            }
        }


    });
});

var categories_manage = myApp.onPageInit('categories-manage', function () {

    var oCategories = $('#categories').data('object');

    var vm = new Vue({

        el: '#categories',

        data: {
            categories: oCategories
        },

        methods: {

            deleteCategory: function (category_id) {

                this.$http.delete(url + '/categories/' + category_id, function (response) {
                });

            }
        }

    });

    $$(document).on('delete', '.swipeout', function () {
        $category_id = $(this).data('id');
        vm.deleteCategory($category_id);
    });


});
var brands_manage = myApp.onPageInit('brands-manage', function () {

    var oBrands = $('#brands').data('object');

    var vm = new Vue({

        el: '#brands',

        data: {},

        methods: {

            deleteBrand: function (brand_id) {

                this.$http.delete(url + '/brands/' + brand_id, function (response) {
                });

            }
        }

    });

    $$(document).on('delete', '.swipeout', function () {
        $brand_id = $(this).data('id');
        vm.deleteBrand($brand_id);
    });


});
