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
                    console.log(request)
                    commit('addComments', {comment: data.data, parentId: request.parent_id});
                    return data;
                })
        },
    },
    mutations: {
        setPostComments: (state, comments) => {
            state.posts.comments = comments;
        },
        addComments: (state, {comment, parentId}) => {
            const {comments} = state.posts;
            console.log(parentId)
            if (parentId) {
                let parentNode = deepSearch(comments, 'id', (k, v) => v === parentId);
                if (parentNode.parent_id !== 0) {
                    parentNode = deepSearch(comments, 'id', (k, v) => v === parentNode.parent_id);
                }
                const parentCommentIndex = comments.findIndex(c => c.id === parentNode.id);
                comments[parentCommentIndex] = comment;
                state.posts.comments = [...comments]
            } else {
                console.log([comment, ...comments])
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
