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
				jobs: []
			}
		},
		methods: {
			createJob(job) {
				axios.post('/api/list', {
					name: job
				}).then(response => this.jobs.push(response.data));
			},
			deleteJob(index, job) {
				this.jobs.splice(index, 1);
				axios.delete('/api/list/' + job.id);
			},
			changeJobStatus(index, job) {
				let status = !this.jobs[index].done;
				
				this.jobs[index].done = status;
				axios.patch('/api/list/' + job.id, {
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
		mounted: function() {
			axios.get('/api/list').then(response => this.jobs = response.data);
		}
	}
</script>