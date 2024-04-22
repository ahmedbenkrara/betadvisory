<template>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Mes formations</h4>
                    <div class="breadcrumb__links">
                        <a style="color: #2196f3;" href="/">Accueil</a>
                        <span>Mes formations</span>
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
                    <div v-for="item in displayedFormations" :key="item.id" class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                        <div class="product__item" @click="redirect(item.formation.id)">
                            <div class="product__item__pic " style="background-repeat: 'no-repeat'; background-size: 'cover';" :style="{backgroundImage: `url(${item.formation.cover})`}">
                                <ul class="product__hover">
                                    <!-- <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li> -->
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ item.formation.title }}</h6>
                                <a style="color: #2196f3;" href="javascript:void(0);" class="add-cart">voir les détails</a>
                                <h5>{{ item.formation.prix }} DH</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="displayedFormations.length == 0">
                    <p style="text-align: center; padding: 200px 0;">Aucun élément trouvé</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->
</template>

<script setup>
import { ref, onMounted, watch } from 'vue'
const { formations } = defineProps(['formations'])

const displayedFormations = ref([])
const title = ref(null)
watch(title, () => filter())

const filter = () => {
    if(title != null){
        displayedFormations.value = formations.filter(item => item.formation.title.toLowerCase().includes(title.value.toLowerCase()))
    }
}

onMounted(() => {
    displayedFormations.value = formations
})

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