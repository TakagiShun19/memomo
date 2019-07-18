<template>
    <div>
        <memo-list @memo-card-has-clicked="showDetailModal"></memo-list>
        <memo-detail-modal ref="memoDetailModal"></memo-detail-modal>
    </div>
</template>

<script>
import MemoList from "./MemoList"
import MemoDetailModal from "./MemoDetailModal"
export default {
    name: "HomeVue",
    component: {MemoDetailModal, MemoList},
    methods: {
        showDetailModal: function($event){
            this.$refs.memoDetailModal.open($event);
        }
    }

}
</script>
