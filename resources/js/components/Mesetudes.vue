<template>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Mes études</h4>
                    <div class="breadcrumb__links">
                        <a href="/">Accueil</a>
                        <span>Mes études</span>
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
                    <div class="shop__sidebar__accordion">
                        <div class="shop__sidebar__search">
                            <form>
                                <input type="text" v-model="title" name="title" placeholder="Recherche...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Liens utiles</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                <li><a :href="'profile'">Profile</a></li>
                                                <li><a :href="'mesetudes'">Mes études</a></li>
                                                <li><a :href="'mesformations'">Mes formation</a></li>
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
                <div class="row">
                    <div v-for="item in displayedEtudes" :key="item.id" class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                        <div class="product__item">
                            <div class="product__item__pic" @click="redirect(item.id)" style="background-repeat: 'no-repeat'; background-size: 'cover';" :style="{backgroundImage: `url(${item.cover})`}">
                                <ul class="product__hover">
                                    <!-- <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li> -->
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ item.title }}</h6>
                                <a :href="'/'+ item.file" :download="'/'+ item.file" class="add-cart">Télécharger</a>
                                <h5>{{ item.prix }} DH</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->
</template>

<script setup>
import { ref, onMounted, watch } from 'vue'
const { etudes, echanges } = defineProps(['etudes', 'echanges'])

const displayedEtudes = ref([])
const title = ref(null)
watch(title, () => filter())

const filter = () => {
    if(title != null){
        displayedFormations.value = formations.filter(item => item.formation.title.toLowerCase().includes(title.value.toLowerCase()))
    }
}

onMounted(() => {
    let safeEtudes = etudes ?? []
    let safeEchanges = echanges ?? []

    safeEtudes = safeEtudes.flatMap(x => x.details.map(detail => detail.etude)) ?? []
    safeEchanges = safeEchanges.map(x => x.etude) ?? []

    displayedEtudes.value = [...safeEtudes, ...safeEchanges]
    console.log(displayedEtudes.value)
})

//Rediiiirect
const redirect = (id) => {
    window.location.href = `/etude/details/${id}`
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