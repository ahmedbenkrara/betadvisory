<template>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Formations</h4>
                    <div class="breadcrumb__links">
                        <a style="color: #2196f3;" href="/">Accueil</a>
                        <span>Formations</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form>
                            <input type="text" v-model="title" name="title" placeholder="Recherche...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Catégories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                <li><a href="javascript:void(0);" @click="category = null">clair</a></li>
                                                <li v-for="item in categories" :key="item.id"><a href="javascript:void(0);" @click="category = item.id">{{ item.name }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">PRIX DU FILTRE</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="javascript:void(0);" @click="price = null">clair</a></li>
                                                <li><a href="javascript:void(0);" @click="price = 'free'">Gratuit</a></li>
                                                <li><a href="javascript:void(0);" @click="price = 'paid'">Payé</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <!-- <p>Affichage de 1 à 12 sur 126 résultats</p> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Trier par prix: </p>
                                <!-- <select>
                                    <option value="asc">Bas en haut</option>
                                    <option value="desc">Haut en bas</option>
                                </select> -->
                                <div class="nice-select" tabindex="0"><span class="current">Bas en haut</span><ul class="list"><li data-value="asc" class="option selected">Bas en haut</li><li data-value="desc" class="option">Haut en bas</li></ul></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div v-for="item in displayedFormations.slice(0,current)" :key="item.id" class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                        <div class="product__item" @click="redirect(item.id)">
                            <div class="product__item__pic " style="background-repeat: 'no-repeat'; background-size: 'cover';" :style="{backgroundImage: `url(${item.cover})`}">
                                <ul class="product__hover">
                                    <!-- <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li> -->
                                </ul>
                            </div>
                            <div class="product__item__text" :itemid="item.id" itemimg="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                <h6>{{ item.title }}</h6>
                                <a style="color: #2196f3;" href="javascript:void(0);" class="add-cart">voir les détails</a>
                                <h5>{{ item.prix }} DH</h5>
                            </div>
                        </div>
                    </div>

                </div>
                <div v-if="displayedFormations.length == 0">
                    <p style="text-align: center; padding: 200px 0;">Aucun élément trouvé</p>
                </div>
                <div class="row">
                    <div v-if="displayedFormations.length > 0 && current <= displayedFormations.length" id="loadmore" @click="loadmore()">Charger plus</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->
</template>

<script setup>
import { ref, onMounted, watch } from 'vue'
const { categories, formations } = defineProps(['categories', 'formations'])

const displayedFormations = ref([])
//filters
const category = ref(null)
const title = ref(null)
//free or paid
const price = ref(null)
//order by price
const order = ref(null)

watch(category, () => filter())

watch(title, () => filter())

watch(price, () => filter())

watch(order, (newvalue, oldvalue) =>{
    if(newvalue == 'asc'){
        displayedFormations.value = displayedFormations.value.sort((a,b) => a.prix - b.prix)
    }else if(newvalue == 'desc'){
        displayedFormations.value = displayedFormations.value.sort((a,b) => b.prix - a.prix)
    }
})

const filter = () => {
    displayedFormations.value = formations.filter(item => {
        const matchCategory = category.value ? item.category_id == category.value : true
        const matchTitle = title.value && title.value.trim() !== '' ? item.title.toLowerCase().includes(title.value.toLowerCase()) : true
        const matchPrix = price.value == 'paid' || price.value == 'free' ? 
            price.value == 'paid' ? item.prix > 0 : item.prix == 0  
        : true
        return matchCategory && matchTitle && matchPrix
    })

    //init the load more pagination
    current.value = perLoad
}

onMounted(() => {
    displayedFormations.value = formations
    $(document).on('click', '.option', function(e){
        order.value = e.target.innerText.trim() == 'Bas en haut' ? 'asc' : 'desc'
    })
})


/******************************************/
/***********Load more pagination***********/
/******************************************/
const perLoad = 25
const current = ref(perLoad)

const loadmore = () => {
    current.value += perLoad
}

//Rediiiirect
const redirect = (id) => {
    window.location.href = `/formation/details/${id}`
}

</script>

<style scoped>
.product__item__pic{
    background-size: cover;
    background-repeat: no-repeat;
}

#loadmore{
    width: fit-content;
    margin: 20px auto;
    cursor: pointer;
    border: 1px solid black;
    color: black;
    font-size: 14px;
    font-weight: 600;
    padding: 6px 20px;
}
</style>