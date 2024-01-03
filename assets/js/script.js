function preventBack(){window.history.forward();} 
    setTimeout("preventBack()", 0); 
    window.onunload=function(){null}; 
// ========== SLIDE HEADER =================
var prev = document.querySelector('.home__slide-prev')
var next = document.querySelector('.home__slide-next');
var imgFeature = document.querySelector('.home__slide-feature'); 
var imgList = document.querySelectorAll('.home__slide-list-img img')
var currentIndex = 0;
window.addEventListener("DOMContentLoaded",function(){
    if(imgList != null){
        imgList.forEach((imgElement,index)=>{
            imgElement.addEventListener('click',e=>{
                imgFeature.style.opacity = '0'
    
                setTimeout(()=>{
                    updateImageByIndex(index)
                    imgFeature.style.opacity = '1'
                },300)
            })
        });
    }
    
    if(prev != null){
        prev.addEventListener('click',e=>{
            if(currentIndex == 0){
                currentIndex = imgList.length - 1;
            }
            else{
                currentIndex--;
            }
            imgFeature.style.animation=''
            setTimeout(()=>{
                updateImageByIndex(currentIndex)
                imgFeature.style.animation= 'forLeft ease-in .8s';
            },200)
        })
    }
    if(next != null){
        next.addEventListener('click',e=>{
            if(currentIndex == imgList.length - 1){
                currentIndex = 0;
            }
            else{
                currentIndex++;
            }
            imgFeature.style.animation=''
            setTimeout(()=>{
                updateImageByIndex(currentIndex)
                imgFeature.style.animation= 'forRight ease-in .8s';
        },200)})
    }
})
function updateImageByIndex(index){
    document.querySelectorAll('.home__slide-list-img div').forEach(item=>{
        item.classList.remove('active');
    })
    currentIndex = index;
    imgFeature.src = imgList[index].getAttribute('src');
    imgList[index].parentElement.classList.add('active');
}

// ============= LOGIN ===============
var moduleLogin = document.querySelector('.module--login');
var btnLogin = document.querySelector('.js-header__nav-item--login');
var closeLogin = document.querySelector('.js-module__close--login');
var moduleLoginContainer = document.querySelector('.js-module__wrap--login')
function showModuleLogin(){
    moduleLogin.classList.add('open')
}
function HidenModuleLogin(){
    moduleLogin.classList.remove('open')
}
window.addEventListener("DOMContentLoaded",function(){
    moduleLoginContainer.addEventListener('click',function(e){
        e.stopPropagation()
    })
    btnLogin.addEventListener('click',showModuleLogin)
    moduleLogin.addEventListener('click',HidenModuleLogin)
    closeLogin.addEventListener('click',HidenModuleLogin)
    var openRegister = document.querySelector('.js-open--register');
    openRegister.addEventListener('click',function(){
    HidenModuleLogin();
    showModuleregister();
})
})
// ============= ĐĂNG KÍ ===============
var moduleregister = document.querySelector('.module--register');
var btnregister = document.querySelector('.js-header__nav-item--register');
var closeregister = document.querySelector('.js-module__close--register');
var moduleregisterContainer = document.querySelector('.js-module__wrap--register')
function showModuleregister(){
    moduleregister.classList.add('open')
}
function HidenModuleregister(){
    moduleregister.classList.remove('open')
}
window.addEventListener("DOMContentLoaded",function(){
    moduleregisterContainer.addEventListener('click',function(e){
        e.stopPropagation()
    })
    btnregister.addEventListener('click',showModuleregister)
    moduleregister.addEventListener('click',HidenModuleregister)
    closeregister.addEventListener('click',HidenModuleregister)
    
    var openlogin = document.querySelector('.js-open--login');
    openlogin.addEventListener('click',function(){
        HidenModuleregister();
        showModuleLogin()
    })
})
var loginSubmit = document.getElementById('login-submit');
var registerSubmit = document.getElementById('register-submit');
window.addEventListener("DOMContentLoaded",function(){
    loginSubmit.addEventListener('click', checkLogin)
    registerSubmit.addEventListener('click', send);
})  
function checkLogin(){
    // // check login
    var loginName = document.getElementById('login-name').value;
    var loginPassword = document.getElementById('login-password').value;

    // -- login-name- exist
    var loginNameExists = document.getElementsByName('login-name-exist');
    var ArrloginNameExists = Array.from(loginNameExists);
    // 
    var listNameExists = ArrloginNameExists.map(ArrloginNameExist =>{
        return ArrloginNameExist.value
    })
    // -- login-email- exist
    var loginEmailExists = document.getElementsByName('login-email-exist');
    var ArrloginEmailExists = Array.from(loginEmailExists);
    // 
    var listEmailExists = ArrloginEmailExists.map(ArrloginEmailExist =>{
        return ArrloginEmailExist.value;
    })
    if(loginName == "" ||loginPassword == "" ){
        alert('Vui lòng không để trống')
    }
    else if(listNameExists.includes(loginName) == false || listEmailExists.includes(loginName)){
        alert('Tên tài khoản không đúng !!')
    }
    else{
        document.getElementById('login').submit()
    } 
}
function send(){
    var registerName = document.getElementById('register-name').value;
    var registerFullName = document.getElementById('register-full-name').value;
    var registerEmail = document.getElementById('register-email').value;
    var registerSdt = document.getElementById('register-sdt').value;
    var registerPassword = document.getElementById('register-password').value;
    var registerBackPassword = document.getElementById('register-back-password').value;
    var registerAddress = document.getElementById('register-address').value;
    // kiểm tra sự tồn tại
    var registerNameExists = document.getElementsByName('register-name-exist');
    // name
    var ListRegisterNameExists = Array.from(registerNameExists);
    var ListValueRegisterNameExists = ListRegisterNameExists.map(ListRegisterNameExist =>{
        return ListRegisterNameExist.value
    })
    // Email
    var registerEmailExists = document.getElementsByName('register-email-exist');
    var ListRegisterEmailExists = Array.from(registerEmailExists);
    var ListValueRegisterEmailExists = ListRegisterEmailExists.map(ListRegisterEmailExist =>{
        return ListRegisterEmailExist.value
    })
    // SDT
    var registerSdtExists = document.getElementsByName('register-sdt-exist');
    var ListRegisterSdtExists = Array.from(registerSdtExists);
    var ListValueRegisterSdtExists = ListRegisterSdtExists.map(ListRegisterSdtExist =>{
        return ListRegisterSdtExist.value
    })
    if(registerName == "" || registerFullName == "" || registerAddress == "" || registerEmail == "" || registerSdt == ""  || registerPassword == "" || registerBackPassword == ""){
        alert('Vui lòng nhập đầy đủ thông tin, không được  để  trống !!!')
    }
    else if(registerName.length < 3 ||  registerName.length > 20){
        alert('Tên Đăng nhập quá ngắn hoặc quá dài, vui lòng nhập lại')
    }
    else if(/[A-Z]/.test(registerName)){
        alert('Tên Đăng nhập không chứa kí tự HOA')
    }
    else if(ListValueRegisterNameExists.includes(registerName) == true){
        alert('Tên Đăng nhập đã tồn tại');
    }
    else  if(registerFullName.length < 4 || registerFullName.length > 60){
        alert('Họ và tên không hợp lệ')
    }
    else  if(registerEmail.length < 6 || registerEmail.length > 35){
        alert('Email quá ngắn hoặc quá dài, vui lòng nhập lại')
    }
    else if(ListValueRegisterEmailExists.includes(registerEmail) == true){
        alert('Email đã tồn tại');
    }
    else if(registerSdt.length <  7 ||  registerSdt.length > 11){
        alert('Số điện thoại không hợp lệ !!')
    }
    else if(ListValueRegisterSdtExists.includes(registerSdt) == true){
        alert('Số điện thoại đã tồn tại');
    }
    else if(registerPassword.length < 5 || registerBackPassword.length <5){
        alert('Mật khẩu phải có độ dài từ 5 kí tự trở lên, vui lòng nhập lại !!')
    }
    else if(!isNaN(registerPassword)| !isNaN(registerBackPassword)){
        alert('Mật khẩu phải phải bao gồm chữ in hoa và chữ thường!!')
    }
    else if(registerPassword != registerBackPassword){
        alert('Nhập lại mật khẩu không khớp vui lòng nhập lại!!')
    }
    else if(registerAddress.length < 15){
        alert('Địa chỉ không hợp lệ vui nhập lại địa chỉ'); 
    }
    else if(registerSdt.startsWith('0')){
        registerSdt = registerSdt.replace("0",""); 
        document.getElementById('register').submit();
    }
    else{
        document.getElementById('register').submit();
    }
}

var productSeach = document.getElementById('product__seach')
var productSeachBtn = document.getElementById('product__seach-submit');
productSeachBtn.addEventListener('click',function(){
    productSeach.submit()
})
// function default
// ============= CHI TIẾT SẢN PHẨM ===============
// chọn size
if(document.getElementById('product-size-l') && document.getElementById('product-size-m')){
    var productPriceM = document.querySelector('.detail__product-price--m')
    var productPriceL = document.querySelector('.detail__product-price--l')
    var BtnProductSizeL = document.getElementById('product-size-l');
    var BtnProductSizeM = document.getElementById('product-size-m');
    BtnProductSizeL.addEventListener('click',function(){
        productPriceL.classList.add('checked');
        productPriceM.classList.remove('checked');
    })
    BtnProductSizeM.addEventListener('click',function(){
        productPriceM.classList.add('checked');
        productPriceL.classList.remove('checked');
    })
}


if(document.getElementById('product-quantity')){
    let productElementQuantity = document.getElementById('product-quantity');
    let productQuantity = productElementQuantity.value;
    var productQuantityReduce = document.getElementById('product-quantity-reduce');
    var productQuantityIncrease = document.getElementById('product-quantity-increase');
    let render = (quantity)=>{
        productElementQuantity.value = quantity
    }

// tăng giảm product
    productQuantityReduce.addEventListener('click',function(){
        if(productQuantity > 1){
            productQuantity--
            render(productQuantity);
        }  
    })
    productQuantityIncrease.addEventListener('click',function(){
        productQuantity++
        render(productQuantity);
    })
}

// CHỈNH SỬA SỐ LƯỢNG GIỎ HÀNG
if(document.getElementsByName('cart-quantity')){
    var ArrcartQuantityElement = document.getElementsByName('cart-quantity');
    var reduceCarts= document.getElementsByName('reduce-cart');
    var increaseCarts = document.getElementsByName('increase-cart');

    reduceCarts.forEach(function(reduceCart,index){
        var cartQuantityElement = ArrcartQuantityElement[index];
        var cartQuantity  = cartQuantityElement.value;
        let render = (quantity)=>{
            cartQuantityElement.value = quantity
        }
        //giảm số lượng
        reduceCart.addEventListener('click',function(){
            if(cartQuantity  > 1){
                cartQuantity --;
                render(cartQuantity)
            } 
        })
    })

    increaseCarts.forEach(function(increaseCart,index){
        var cartQuantityElement = ArrcartQuantityElement[index];
        var cartQuantity  = cartQuantityElement.value;
        let render = (quantity)=>{
            cartQuantityElement.value = quantity
        }
        //giảm số lượng
        increaseCart.addEventListener('click',function(){
                cartQuantity ++;
                render(cartQuantity)
        })
    })
}
// order
if(document.getElementById('order__submit')){
    var orderSubmit = document.getElementById('order__submit');
    orderSubmit.addEventListener('click',function(){
        var orderForm =  document.getElementById("order__form");
        orderForm.submit();
    })
}









