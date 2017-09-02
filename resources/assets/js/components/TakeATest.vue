<template>
    <div id="personality-test" class="take-a-test">
        <div class="progress mb-4">
            <div class="progress-bar"
                 role="progressbar"
                 :style="{ width: progress+'%' }"
                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <template v-for="(chunk, chunkIndex) in questions">
            <transition-group name="fade">
                <div v-show="chunk.show" :key="chunkIndex">
                    <div v-for="(group, groupIndex) in chunk.items" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div v-for="(question, index) in group.questions" :class="['col-6', {'text-right': index == 0 }]">
                                    <label :class="['custom-control', 'custom-radio', {'custom-control--rtl': index == 0 }]">
                                        <input :id="`q-${question.id}`"
                                               :value="question.preference.code"
                                               v-model="results[getOffsetIndex(groupIndex, chunkIndex, chunk.items.length)]"
                                               type="radio"
                                               class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{ question.question }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button v-if="!isLast" class="btn btn-primary btn-lg" @click="next(chunkIndex)">Next</button>
                        <button v-if="isLast" class="btn btn-primary btn-lg" @click="getResults" :disabled="loading">
                            <span v-if="loading">Please Wait...</span>
                            <span v-else>Results</span>
                        </button>
                    </div>
                </div>
            </transition-group>
        </template>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                questions: [],
                results: [],
                activeChunkIndex: 0,
                loading: false
            }
        },
        computed: {
            progress() {
              return (this.activeChunkIndex / this.questions.length) * 100;
            },
            isLast() {
              return (this.activeChunkIndex+1) === this.questions.length
            }
        },
        methods: {
            fetchQuestions() {
                this.$http.get('/api/questions').then(({data}) => {
                    let chunks = _.chunk(data, 6);

                    chunks = chunks.map((chunk) => {
                       return { show: false, items: chunk };
                    });
                    chunks[0].show = true;
                    this.questions = chunks;

                    for (let i = 0; i < data.length; i++) {
                        this.results.push('');
                    }
                })
            },
            next(currentIndex) {
                this.questions[currentIndex].show = false;
                this.questions[currentIndex+1].show = true;

                setTimeout(() => {
                    this.activeChunkIndex = currentIndex+1;
                });

                $("html, body").animate({ scrollTop: $('#personality-test').offset().top }, "slow");
            },
            getResults() {
                this.loading = true;
                this.$http.post('/api/results', {results: this.results}).then(({data}) => {

                    window.location = `/results/${data.result_id}/${data.type}-personality`;

                    setTimeout(() => {
                        this.loading = false;
                    }, 300);
                }).catch(() => {
                    setTimeout(() => {
                        this.loading = false;
                    }, 300);
                });
            },

            // -----------
            // Helpers
            // -----------
            getOffsetIndex(number, page, perPage) {
                return number + (page * perPage);
            }
        },
        mounted() {
            this.fetchQuestions();
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0
    }

    .take-a-test {
        margin-bottom: 100px;
        margin-top: 50px;
        padding-top: 30px;
    }
    .progress-bar {
        transition: width .3s ease;
    }
</style>
