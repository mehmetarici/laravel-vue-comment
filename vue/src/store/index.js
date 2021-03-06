import {createStore} from "vuex";
import axiosClient from "../axios";

const store = createStore({
    state: {
        posts: {
            comments: []
        }
    },
    getters: {
        comments(state) {
            return state.posts.comments;
        }
    },
    actions: {
        getComments({commit}) {
            return axiosClient.get("/posts/34343/comments").then((res) => {
                commit("setPostComments", res.data.data);
                return res;
            });
        },

        createComment({commit}, request) {
            return axiosClient.post('/posts/34343/comments', request)
                .then(({data}) => {
                    commit('addComments', data.data);
                    return data;
                })
        },
    },
    mutations: {
        setPostComments: (state, comments) => {
            state.posts.comments = comments;
        },

        addComments: (state, comment) => {
            const {comments} = state.posts;
            if (comment.parent_id) {
                const parentNode = deepSearch(comments, 'id', (k, v) => v === comment.parent_id);
                let parentCommentIndex = -1;
                let topParentCommentIndex = -1;
                if (parentNode.parent_id !== 0) {
                    const topParentNode = deepSearch(comments, 'id', (k, v) => v === parentNode.parent_id);
                    topParentCommentIndex = comments.findIndex(c => c.id === topParentNode.id);
                    parentCommentIndex = comments[topParentCommentIndex].replies.findIndex(r => r.id === parentNode.id);
                } else {
                    parentCommentIndex = comments.findIndex(c => c.id === parentNode.id);

                }

                if (topParentCommentIndex !== -1) {
                    let replies = comments[topParentCommentIndex].replies[parentCommentIndex].replies ? comments[topParentCommentIndex].replies[parentCommentIndex].replies : [];
                    replies = [comment, ...replies]
                    comments[topParentCommentIndex].replies[parentCommentIndex].replies = replies;
                } else {
                    let replies = comments[parentCommentIndex].replies ? comments[parentCommentIndex].replies : [];
                    replies = [comment, ...replies];
                    comments[parentCommentIndex].replies = replies;
                }
                state.posts.comments = [...comments]
            } else {
                state.posts.comments = [comment, ...comments]
            }
        },
    },
    modules: {},
})

function deepSearch(object, key, predicate) {
    if (object.hasOwnProperty(key) && predicate(key, object[key]) === true) return object

    for (let i = 0; i < Object.keys(object).length; i++) {
        let value = object[Object.keys(object)[i]];
        if (typeof value === "object" && value != null) {
            let o = deepSearch(object[Object.keys(object)[i]], key, predicate)
            if (o != null) return o
        }
    }
    return null
}

export default store;
