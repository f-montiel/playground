<template>
	<div>
		<div class="form-group">
			<label>Tarea</label>
			<input type="text" name="job" v-model='job' class="form-control col col-md-6">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" @click="create(job)">Agregar</button>
		</div>
	</div>
</template>
<script>
	export default{
		data(){
			return {
				job: ''
			}
		},
		methods: {
			create(job){
				if(!job) {
					return alert('Debe ingresar una tarea');
				}
				this.$emit('create-job', job);
				this.job = '';
			}
		}
	}
</script>