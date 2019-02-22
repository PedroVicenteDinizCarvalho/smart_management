<template>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                          <a v-if="create && !modal" v-bind:href="create">Criar</a>
                          <modal-link-component v-if="create && modal" type="button" name="create" title="criar" css=""></modal-link-component>
                     </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                     <input type="search" class="form-control mr-sm-2" placeholder="Buscar" v-model="search">
                </form>
           </div>
        </nav>

		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th style="cursor: pointer" v-on:click="columnOrder(index)" v-for="(title, index) in titles" scope="col">{{ title }}</th>
		      <th v-if="detail || edit || remove" scope="col">Ações</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr v-for="(item, index) in list">
		      <td v-for="i in item">{{ i }}</td>
		      <td v-if="detail || edit || remove">
				<form v-bind:id="index" v-if="remove && token" v-bind:action="remove" method="post">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" v-bind:value="token">

					<!-- Button Edit -->
                       	<a class="btn btn-outline-primary" 
                       		v-if="edit && !modal"  
                       		v-bind:href="edit">Editar</a>
                       	<modal-link-component 
                            v-if="edit && modal"
                            v-bind:item="item" 
                            type="link" name="edit" title="Editar" css="">
						            </modal-link-component>
                  
                  	<!-- Button Detail -->
                       	<a 
                       		v-if="detail && !modal" 
                       		v-bind:href="detail">Detalhe</a>
                       	<modal-link-component 
                            v-if="detail && modal" 
                            v-bind:item="item" 
                            type="link" name="detail" title="Detalhe" css="">
                        </modal-link-component>
                  
                  	<!-- Button Delete -->
                       	<a class="btn btn-outline-danger" href="#" v-on:click="runForm(index)">Deletar</a>
				</form>

				<span v-if="!token">
                  <!-- Button Edit -->
                       <a 
                            v-if="edit && !modal" 
                            v-bind:href="edit">Editar
                       </a>
                       <modal-link-component 
                            v-if="edit && modal"
                            v-bind:item="item" 
                            type="link" name="edit" title="Editar" css="">
                       </modal-link-component>
                  
                  <!-- Button Detail -->
                       <a 
                            v-if="detail && !modal" 
                            v-bind:href="detail">
                            Detalhe
                       </a>
                       <modal-link-component 
                            v-if="detail && modal"
                            v-bind:item="item" 
                            type="link" name="detail" title="Detalhe" css="">
                       </modal-link-component>
                  
                  <!-- Button Delete -->
                       <a 
                            v-if="remove" 
                            v-bind:href="remove">Deletar
                       </a>
                </span>

                <span v-if="token && !remove">
                  <!-- Button Edit -->
                       <a 
                            v-if="edit && !modal" 
                            v-bind:href="edit">Editar
                       </a>
                       <modal-link-component 
                            v-if="edit && modal" 
                            v-bind:item="item"
                            type="link" name="edit" title="Editar" css="">
                       </modal-link-component>
                  
                  <!-- Button Detail -->
                       <a 
                            v-if="detail && !modal" 
                            v-bind:href="detail">Detalhe
                       </a>
                       <modal-link-component 
                            v-if="detail && modal" 
                            v-bind:item="item" 
                            type="link" name="detail" title="Detalhe" css="">
                       </modal-link-component>
                </span>
		      </td>
		    </tr>
		  </tbody>
		</table>
	</div>	
</template>
<script>
	export default {
		props: ['titles', 'items', 'order', 'colorder', 'create', 'detail', 'remove',  'edit','token', 'modal'],

		data: function(){
			return{
				search: '',
				auxOrder: this.order || 'asc',
				auxColOrder: this.colorder || 0,
			}
		},

		methods: {
			runForm: function(index){
				document.getElementById('id').submit();
			},
			columnOrder:function(col){
				this.auxColOrder == col;
				if(this.auxOrder == "asc"){
					this.auxOrder = "desc";
				}else{
					this.auxOrder = "asc";
				}
			},
		},

		computed:{
			list: function(){
				let order = this.auxOrder;
				let colorder = this.auxColOrder;
				order = order.toLowerCase();
				colorder = parseInt(colorder);

				if(order == "asc"){
					this.items.sort(function (a, b){
						if (Object.values(a)[colorder] > Object.values(b)[colorder] ) { return 1; }
						if (Object.values(a)[colorder] < Object.values(b)[
							colorder] ) { return -1; }
						return 0;
					});
				}else{
					this.items.sort(function(a, b){
                        if (Object.values(a)[colorder] < Object.values(b)[colorder] ) { return 1; }
                        if (Object.values(a)[colorder] > Object.values(b)[colorder] ) { return -1; }
                        return 0;
                    });	
				}

				if(this.search){
	                return this.items.filter(res => {
                        res = Object.values(res);
	                      for(let k = 0; k < res.length; k++){
	                           if((res[k] + "").toLowerCase().indexOf(this.search.toLowerCase()) >= 0){
	                                return true;
	                           }  
	                      }
	                      return false;
	                });
                }

                return this.items;
			},
		}
	}
</script>