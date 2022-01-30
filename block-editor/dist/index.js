!function(){"use strict";var e=window.wp.blocks,t=window.wp.i18n,r=window.wp.element,i=window.wp.components,c=window.wp.compose,a=window.wp.data,n=(0,c.compose)([(0,a.withSelect)((e=>({excerpt:e("core/editor").getEditedPostAttribute("excerpt")}))),(0,a.withDispatch)((e=>({onSetExcerpt(t){e("core/editor").editPost({excerpt:t})}})))])((e=>{let{attributes:{rating:c,cookingTime:a},excerpt:n,className:m,onSetExcerpt:o,setAttributes:l}=e;return(0,r.createElement)(i.Card,null,(0,r.createElement)(i.CardHeader,null,(0,t.__)("Recipe","yummy-recipes")),(0,r.createElement)(i.CardBody,null,(0,r.createElement)("div",{className:`${m}-field`},(0,r.createElement)(i.RangeControl,{label:(0,t.__)("Rating","yummy-recipes"),value:c,onChange:e=>l({rating:parseInt(e)}),min:1,max:5})),(0,r.createElement)("div",{className:`${m}-field`},(0,r.createElement)(i.__experimentalNumberControl,{label:(0,t.__)("Cooking Time (in minutes)","yummy-recipes"),isShiftStepEnabled:!0,onChange:e=>l({cookingTime:parseInt(e)}),shiftStep:10,value:a,required:!0})),(0,r.createElement)("div",{className:`${m}-field`},(0,r.createElement)(i.TextareaControl,{label:(0,t.__)("Short Description (excerpt)","yummy-recipes"),value:n,onChange:e=>o(e)}))))}));(0,e.registerBlockType)("yummy-recipes/recipe",{title:(0,t.__)("Recipe","yummy-recipes"),description:(0,t.__)("Recipe details block","yummy-recipes"),category:"common",icon:"food",attributes:{rating:{type:"number",default:5,source:"meta",meta:"rating"},cookingTime:{type:"number",default:60,source:"meta",meta:"cooking_time"}},edit:n});(0,e.registerBlockType)("yummy-recipes/recipe-search",{title:(0,t.__)("Recipe Search","yummy-recipes"),description:(0,t.__)("Recipe Search block","yummy-recipes"),category:"common",icon:"search",edit:()=>(0,r.createElement)(i.Card,null,(0,r.createElement)(i.CardHeader,null,(0,t.__)("Recipe Search","yummy-recipes")),(0,r.createElement)(i.CardBody,null,(0,r.createElement)(i.Placeholder,{icon:"search",label:(0,t.__)("Search","yummy-recipes")})))})}();