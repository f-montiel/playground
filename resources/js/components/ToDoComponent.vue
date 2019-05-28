<template>
	<div>
		<custom-form @create-job="createJob"></custom-form>
		<label class="d-block">Tareas:<span> {{ jobs.length }}</span></label>
		<label class="d-block">Tareas Completedas:<span> {{ CompletedJobs }}</span></label>
		<list :jobs="jobs" @delete-job="deleteJob" @change-job-status="changeJobStatus"></list>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				jobs: [],
			}
		},
		methods: {
			//tiene una desventaja, cuando agrego espera a que el servidor responda y despues agrega el item.
			// pero si no lo hago asi, cuando lo agrego no tiene id y no lo puedo actualizar.
			createJob(job) {
				axios.post('/list', {
					name: job
				}).then(response => this.jobs.push(response.data));
			},
			deleteJob(index, job) {
				//no estoy seguro de que esto este prolijo
				this.jobs.splice(index, 1);
				axios.delete('/list/' + job.id);
			},
			changeJobStatus(index, job) {
				let status = '';
				if (this.jobs[index].done == 0) {
					status = 1;
				}
				else {
					status = 0;
				}
				this.jobs[index].done = status;
				axios.put('updatejob', {
							id: job.id,
							done: status
						});
			}
		},
		computed: {
			CompletedJobs() {
				return this.jobs.filter(function(jobs) {
						return jobs.done == 1;
				}).length;
			}
		},
		mounted() {
			axios.get('/list').then(response => this.jobs = response.data);
		}
	}
</script>