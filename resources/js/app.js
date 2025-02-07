/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


window.search = function() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('src_bar');
    filter = input.value.toUpperCase();
    ul = document.getElementById("products");
    li = ul.getElementsByTagName("a");
    for (i = 0; i < li.length; ++i) {
        a = li[i].getElementsByClassName("product-name")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

window.category = function() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('category');
    filter = input.value.toUpperCase();
    ul = document.getElementById("products");
    li = ul.getElementsByTagName("a");
    for (i = 0; i < li.length; ++i) {
        a = li[i].getElementsByClassName("product-description")[0].children[2];
        txtValue = a.textContent || a.innerText;
        if (filter.toUpperCase() == "ALL" || txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

window.sort = function() {
    function comp(a,b,mode) {
        if (mode == 1) 
            return a>b;
        else
            return a<b;
    }

    
    var list, i, switching, b, shouldSwitch, mode;
    mode = document.getElementById("sort").value;
    list = document.getElementById("products");
    switching = true;
    while (switching) {
        switching = false;
        b = list.getElementsByTagName("a");
        for (i = 0; i < (b.length - 1); ++i) {
            shouldSwitch = false;
            bi = b[i].getElementsByClassName("product-description")[0].children[0].innerText;
            bi = Number(bi.substring(0,bi.lastIndexOf("$")))
            bj = b[i+1].getElementsByClassName("product-description")[0].children[0].innerText;
            bj = Number(bj.substring(0,bj.lastIndexOf("$")))
            if (comp(bi,bj,mode)) {
                shouldSwitch = true;
            break;
            }
        }
        if (shouldSwitch) {
            b[i].parentNode.insertBefore(b[i + 1], b[i]);
            switching = true;
        }
    }
}

