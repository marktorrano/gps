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

                var fd = new FormData(document.querySelector('.item-form'));


                console.log(fd);

                $('#photo').val('');


                this.$http.post('items', fd).then(function (response) {
                    console.log(response);
                });

                this.submitted = true;

                this.fields = {
                    name: '', price: '', photo: ''
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
            cartTotal: '',
            items: [],
            cleared: false,
            checkedout: false,
            orderNumber: '',
        },

        ready: function () {

            this.fetchCartItems();
            this.fetchTotal();

        },
        methods: {
            fetchCartItems: function () {

                this.$http.get('get-cart-items').then(function (items) {
                    this.items = items.data;
                });

            },
            fetchTotal: function () {
                this.$http.get('fetch-cart-total').then(function (cartTotal) {
                    this.cartTotal = cartTotal.data;
                });
            },
            clearCart: function () {
                this.$http.get('carts-clear').then(function (response) {
                    this.cleared = true;
                    this.items = '';
                });
            },

            onAddQty: function (item) {
                this.$http.get('carts-items/' + item.id).then(function (response) {
                    this.fetchCartItems();
                    this.fetchTotal();
                });
            },
            onReduceQty: function (item) {
                this.$http.get('carts-items-decrease/' + item.identifier).then(function (response) {
                    this.fetchCartItems();
                    this.fetchTotal();

                });
            },
            checkOutMember: function () {

            },
            checkOutGuest: function () {
                this.cleared = true;

                //TODO make post request to record order and display order number
                this.$http.get('place-order').then(function (response) {
                    console.log(response);
                });

                this.checkedout = true;
                this.items = '';
            },

            close: function (section) {
                if (section == 'cart') {

                    this.cleared = false;
                }
                if (section == 'checkout') {
                    this.checkedout = false;
                }
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
            fetchCategories: function () {

                this.$http.get('categories').then(function (categories) {
                    this.$set('categories', categories);
                });
            },
            fetchNewProducts: function () {

                this.$http.get('get-new-products', function (products) {
                    this.products = products;
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
myApp.onPageInit('address', function () {

    var vm = new Vue({
        el: '#address',

        data: {
            addresses: [],
        },
        ready: function () {
            this.fetchAddresses();
        },
        methods: {

            fetchAddresses: function () {

                this.$http.get('fetch-addresses').then(function (addresses) {
                    this.addresses = addresses.data;
                });
            },
            selectAddress: function (id) {
                this.$http.get('address/' + id).then(function (response) {
                });
            }
        }

    });
});
myApp.onPageInit('checkout', function () {

    var vm = new Vue({
        el: '#checkout',
        data: {
            shippingAddress: {},
            total: '',
            items: [],
            cartTotal: '',
        },
        ready: function () {
            this.$http.get('fetch-default-address').then(function (address) {
                this.shippingAddress = address.data;
            });
            this.$http.get('fetch-cart-total').then(function (cartTotal) {
                vm.cartTotal = cartTotal.data;
            });
            this.$http.get(url + '/get-cart-items').then(function (items) {
                this.items = items.data;
            });
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
