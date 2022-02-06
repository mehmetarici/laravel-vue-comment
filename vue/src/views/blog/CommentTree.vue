<template>
    <div :class="deeper===0 ? '' : 'ml-[2rem] md:ml-[3rem]'">
        <CommentNode
            :comment="comment"
            :lastNode="isLastNode"
        />

        <div v-if="hasChildren">
            <CommentTree
                v-for="reply in comment.replies"
                :key="reply.id"
                :comment="reply"
                :spacing="3"
                :deeper="deeper+1"

            />
        </div>
    </div>
</template>

<script>
import {CommentNode} from "../";

export default {
    name: 'CommentTree',
    components: {CommentNode},
    props: {
        comment: {
            type: Object,
            required: true
        },
        spacing: {
            type: Number,
            default: 0
        },
        deeper: {
            type: Number,
            default: 0
        }
    },
    computed: {
        isLastNode() {
            return this.deeper > 1;
        },
        hasChildren() {
            const {replies} = this.comment
            return replies && replies.length > 0
        },
    },
}

</script>
