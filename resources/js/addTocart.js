let items = localStorage.key('cart') ? localStorage.getItem('cart') : null
$(document).on('click', '.cart', function(e){
    items = localStorage.key('cart') ? localStorage.getItem('cart') : null
        let all = []
        const id = e.target.offsetParent.getAttribute('itemid')
        const img = e.target.offsetParent.getAttribute('itemimg')
        const title = e.target.offsetParent.children[0].textContent
        const price = e.target.offsetParent.children[2].textContent.split(' ')[0]
        const obj = {id, img, title, price}
        
        if(items != null){
            all = JSON.parse(items) 
            const found = all.filter(x => x.id === id)
            if(found.length == 0){
                all.push(obj)
            }
            localStorage.setItem('cart', JSON.stringify(all))
        }else{
            localStorage.setItem('cart', JSON.stringify([obj]))
        }
        var audio = new Audio('/files/addsound.mp3')
        audio.play()
        updatePrice()
})

$(document).on('click', '.detailscart', function(e){
    items = localStorage.key('cart') ? localStorage.getItem('cart') : null
    let all = []
    const getdata = JSON.parse(e.target.getAttribute('testid'))
    const cartdata = {
        'id': getdata.id,
        'img': getdata.cover,
        'price': getdata.prix,
        'title': getdata.title,
    }

    if(items != null){
        all = JSON.parse(items) 
        const found = all.filter(x => x.id === cartdata.id)
        if(found.length == 0){
            all.push(cartdata)
        }
        localStorage.setItem('cart', JSON.stringify(all))
    }else{
        localStorage.setItem('cart', JSON.stringify([cartdata]))
    }

    var audio = new Audio('/files/addsound.mp3')
    audio.play()
    updatePrice()
})

//Display cart
const display = () => {
    const carttable = document.getElementById('carttable')
    if(carttable){
        const total = document.getElementById('total')
        let cpt = 0
        carttable.innerHTML = ''
        if(items){
            const cartitems = JSON.parse(items)
            cartitems.forEach((item, index) => {
                $('#itemsc').append(`
                    <option value="${item.id}">${item.title}</option>
                `)
                cpt += parseFloat(item.price)
                carttable.innerHTML += `
                    <tr>
                        <td class="product__cart__item__text">
                            <div class="product__cart__item__pic">
                                <img src="${item.img}" style="width:90px; object-fit:cover; height:90px;" alt="">
                            </div>
                        </td>
                        <td class="product__cart__item__text">
                            <h6>${item.title}</h6>
                        </td>
                        <td class="product__cart__item__text">
                            <h6>Étude</h6>
                        </td>
                        <td class="cart__price" style="color: #2196f3;">${item.price} DH</td>
                        <td class="cart__close" itemindex="${item.id}"><i class="fa fa-close" itemindex="${item.id}"></i></td>
                    </tr>
                `
            })
            total.innerText = `${cpt.toFixed(2)} DH`
            $('.pricetop').text(`${cpt.toFixed(2)} DH`)
        }else{
            total.innerText = `0.00 DH`
            $('.pricetop').text(`0.00 DH`)
        }
    }
}

display()

//price
const updatePrice = () => {
    items = localStorage.key('cart') ? localStorage.getItem('cart') : null
    let cpt1 = 0
    if(items){
        const cartitems = JSON.parse(items)
        $('.itemscounter').text(cartitems.length)
        cartitems.forEach((item) => {
            cpt1 += parseFloat(item.price)
        })
        $('.pricetop').text(`${cpt1.toFixed(2)} DH`)
    }else{
        $('.itemscounter').text('0')
        $('.pricetop').text(`0.00 DH`)
    }
}
updatePrice()

//delete an item
$(document).on('click', '.cart__close', function(e){
    const index = e.target.getAttribute('itemindex')
    let cartitems = JSON.parse(items)
    cartitems = cartitems.filter(x => x.id != index)
    if(cartitems.length == 0){
        localStorage.removeItem('cart')
    }else{
        localStorage.setItem('cart', JSON.stringify(cartitems))
    }
    items = localStorage.key('cart') ? localStorage.getItem('cart') : null
    display()
    updatePrice()
})