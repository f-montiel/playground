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
			createJob(job) {
				this.jobs.push(
						{
							name: job,
							completed: false
						}
					);
				},
			deleteJob(index) {
				this.jobs.splice(index, 1);
			},
			changeJobStatus(index) {
				this.jobs[index].completed = !this.jobs[index].completed;
			}
		},
		computed: {

			CompletedJobs() {
				return this.jobs.filter(function(jobs) {
						return jobs.completed == true;
				}).length; 
			}
		}
	}
</script>