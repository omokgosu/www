(function(){var t={268:function(t,n,e){"use strict";var s=e(538),r=function(){var t=this,n=t._self._c;return n("div",{attrs:{id:"app"}},[n("HeaderArea"),n("router-view",{directives:[{name:"scroll:",rawName:"v-scroll:"}]}),n("FooterArea")],1)},i=[],o=function(){var t=this,n=t._self._c;return n("header",{attrs:{id:"headerArea"}},[n("h1",[n("router-link",{staticClass:"logo",attrs:{to:"/main"}})],1),n("nav",[n("h2",{staticClass:"hidden"},[t._v("네비게이션 영역")]),n("router-link",{staticClass:"link",attrs:{to:"/sub1"}},[t._v("책방검색")]),n("router-link",{staticClass:"link",attrs:{to:"/sub2"}},[t._v("추천도서")])],1)])},a=[],l={props:["plogo"]},u=l,c=e(1),p=(0,c.Z)(u,o,a,!1,null,null,null),d=p.exports,f=function(){var t=this;t._self._c;return t._m(0)},v=[function(){var t=this,n=t._self._c;return n("footer",[n("p",{staticClass:"copy"},[t._v("vue와 공공데이터 포털 api를 활용한 포트폴리오 사이트입니다. 전국의 중고서점을 검색해 보실 수 있습니다.")])])}],_={},h=_,g=(0,c.Z)(h,f,v,!1,null,null,null),m=g.exports,b={name:"app",data(){return{}},methods:{headScroll:()=>{var t=document.querySelector("#headerArea"),n=document.querySelector("article");window.scrollY>n.offsetTop?t.style.background="rgba(0,0,0,.7)":t.style.background="transparent"}},components:{HeaderArea:d,FooterArea:m},mounted(){document.addEventListener("scroll",this.headScroll)}},k=b,x=(0,c.Z)(k,r,i,!1,null,null,null),w=x.exports,C=e(345),y=function(){var t=this,n=t._self._c;return n("article",[n("MainVisual"),n("h2",{staticClass:"hidden"},[t._v("메인 콘텐츠 영역")]),n("section",{staticClass:"search"},[n("h3",[t._v("책을 거닐다.")]),n("div",{staticClass:"s_content"},[n("img",{attrs:{src:e(948),alt:""}}),n("div",{staticClass:"s_text"},[t._m(0),n("p",[t._v("요즘 현대인들은 1년에 책 한 권을 읽는 사람도 드물다고 합니다. 생각해보면 스마트폰에 익숙해지기 전에는 그래도 책을 꽤 읽었습니다. 길거리를 지나가다 보이는 낡은 서점에 들어가 기분좋게 퀴퀴한 책 냄새를 맡으며 서서 책을 읽곤 했습니다. 또 새 책을 샀을 때는 어떤가요? 이상하게 새 책 냄새를 맡으면서 깔깔 웃곤 하진 않았나요")]),n("p",[t._v('하지만 오랜만에 책을 읽으려고 해도 근처 교보문고를 가야하나.. 어디서 책을 사야하나 잘 모르시겠죠? 책크방에서는 주변에 있는 중고서점을 "책크"하실 수 있도록 도와 드립니다! 책크방으로 내 근처의 서점은 어디인가 확인해보세요! 서점의 위치는 1년마다 갱신됩니다.')]),t._v(" "),n("router-link",{staticClass:"link",attrs:{to:"/sub1"}},[t._v("more")])],1)])]),n("div",{staticClass:"book"},[n("h3",[t._v("추천도서")]),n("swiper",{staticClass:"swiper",attrs:{options:t.swiperOption}},[t._l(t.book,(function(s,r){return n("swiper-slide",{key:r},[n("router-link",{attrs:{to:"/sub2"}},[n("img",{attrs:{src:e(421)("./list-"+(r+1)+".png")}}),n("dl",[n("dt",[t._v(t._s(s.dt))]),n("dd",[n("span",[t._v(t._s(s.span))]),t._v(t._s(s.dd))])])])],1)})),n("div",{staticClass:"swiper-button-prev",attrs:{slot:"button-prev"},slot:"button-prev"}),n("div",{staticClass:"swiper-button-next",attrs:{slot:"button-next"},slot:"button-next"})],2)],1)],1)},O=[function(){var t=this,n=t._self._c;return n("p",[n("span",[t._v("책크방은")]),t._v(" 공공데이터 포털의 API를 이용한 중고서점 검색 애플리케이션입니다.")])}],S=e(697),L=function(){var t=this;t._self._c;return t._m(0)},j=[function(){var t=this,n=t._self._c;return n("div",{staticClass:"main"},[n("img",{attrs:{src:e(648),alt:""}}),n("p",[t._v("좋은 책을 읽는다는 것은 과거 몇 세기의 훌륭한 사람들과 이야기를 나누는 것과 같다. ")])])}],A={},P=A,Z=(0,c.Z)(P,L,j,!1,null,null,null),N=Z.exports,T=JSON.parse('[{"dt":"앵무새 죽이기","span":"하퍼 리","dd":"이 작품은 미국에서 인종차별이 가장 심했던 주 가운데 하나인 남부 앨라바마 주에서 실제로 있었던 일을 토대로 젊은 백인 여성을 성폭했다는 누명을 쓴 한 흑인 청년을 변호사가 법정에서 변호하는 이야기를 담고 있다. 소설 속 화자인 6살 소녀 스카웃의 눈으로 작품의 핵심이 되는 사건을 관찰하며 1930년대 대공황의 여파로 피폐해진 미국의 모습과 사회계층 간, 인종 간의 첨예한 대립을 그리고 있다."},{"dt":"로미오와 줄리엣","span":"윌리엄 셰익스피어","dd":"오랜 세월 서로 반목해 온 몬테규와 캐플릿 가문의 아들과 딸인 로미오와 줄리엣은 가면무도회에서 서로 첫눈에 반해 영원히 함께할 것을 맹세한다. 그러나 시비에 휘말린 로미오는 친구 머큐쇼를 죽인 티볼트를 죽이는데, 티볼트와 바로 캐플릿 가문의 조카, 즉 줄리엣의 사촌이다. 이 사건으로 로미오는 추방형을 받는다. 로미오와 줄리엣은 처음이자 마지막으로 하룻밤을 함께 보내고 로미오는 도피한다."},{"dt":"해리포터와 마법사의 돌","span":"조앤 k 롤링","dd":"볼드모트에게 부모를 잃고 홀로 살아남은 해리가 열한 번째 생일날, 해그리드를 통해 자신이 마법사라는 사실을 알게 되고 호그와트 마법학교에 입학하며 벌어지는 이야기를 담고 있다. 헤르미온느 그레인저, 론 위즐리라는 친구들과 함께 영생을 주는 마법사의 돌을 찾는 모험이 시작된다."},{"dt":"안네의 일기","span":"안네 프랑크","dd":"독일의 바이마르 공화국 시대에 프랑크푸르트 암 마인에서 태어난 유대인 소녀 안네는 생애의 대부분을 네덜란드의 암스테르담에서 보냈다. 2차대전 당시 독일이 네덜란드를 점령하고 있는 동안 은신처에 숨어 살기 시작한 열세살 때 부터 2년 뒤 나치에 발각되어 끌려가기까지 써내려간 이 일기는 감수성 강하고 영리한 사춘기 소녀의 순수한 내면세계를 보여주는 전쟁문학의 대표작으로 평가받는다."},{"dt":"톰 소여의 모험","span":"마크 트웨인","dd":"하루가 멀다 하고 온갖 말썽을 일으키는 개구쟁이 소년 톰 소여. 동네 아이들을 속여 자기 대신 울타리에 칠을 하게 하고, 친구들을 이끌고 해적이 되겠다며 작은 섬에서 야영을 하고, 학예회 날 선생님의 가발을 벗겨 망신을 주는 등 톰의 장난과 말썽은 무궁무진하다. 그러던 어느 날, 톰은 친구 허크에게 해적이 숨겨 놓은 보물을 찾아보자고 제안한다."},{"dt":"파리대왕","span":"윌리엄 골딩","dd":"무인도에서 벌어지는 소년들의 삶과 죽음, 투쟁을 그린 작품으로 인간 본성의 결함에서 사회결함의 근원을 나타낸 소설이다. 일반적인 불안의 풍토 속에서 구상된 모험담으로 우화와 알레고리의 차원을 지닌 작품으로 폭발적인 호소력을 발휘한 소설이다."},{"dt":"주홍글씨","span":"너대니얼 호손","dd":"17세기 뉴 잉글랜드의 엄격한 청교도 사회를 배경으로, 사생아를 낳은 여인 헤스터 프린과 그 아이의 아버지인 아서 딤스데일 목사를 중심으로 벌어지는 여러가지 갈등과 사건을 이야기한다."},{"dt":"위대한 개츠비","span":"F.스콧 피츠제럴드","dd":"개츠비는, 근본을 알 수 없는 벼락부자이며, 데이지는 남자보다는 \'영국제 셔츠\'를 더 사랑하는 나약하고 철없는 여자다. 데이지의 남편 톰은 잔인하고 이기적인 존재이며, 골프선수 조던 베이커는 약삭빠른 거짓말쟁이다. 화자 닉의 냉정하면서도 객관적인 시선을 통해 그려지는 인물들의 모순과 간극은 이 소설의 가장 큰 즐거움 중 하나이다. 속물적이고 통속적인 존재들이 갈등하고 부딪히는, 살아 숨쉬는 책이다."},{"dt":"생쥐와 인간","span":"존 스타인백","dd":"뜨내기 일꾼 조지와 레니의 오랜 우정과, 자신들의 땅을 사서 일구려는 그들의 소박한 꿈이 경제 대공황의 현실 속에서 무너지는 과정을 보여준다. 떠돌이 일꾼들의 외로움과 비애, 운명 앞에서 연약한 인간의 모습을 그려내었다."},{"dt":"1984","span":"조지 오웰","dd":"현재사회에도 유의미하다. 1947년에 쓴 미래소설이지만 당시보다도 정보 기술의 발달로 개개인의 사생활과 신상정보가 쉽게 노출될 수 있는 오늘날, 오웰의 작품이 보내는 경고는 더욱 심각하게 받아들여진다. 이 책은 언어와 역사가 철저히 통제되고 성본능은 오직 당에 충성할 자녀를 생산하는 수단으로 억압되며, 획일화와 집단 히스테리가 난무하는 인간의 존엄상과 자유가 박탈된 전체주의 사회를 그리고 있다. 전체주의라는 거대한 지배 시스템 앞에 놓인 개인이 어떻게 저항하고 파멸해 가는가를 적나라하게 보여준다."}]'),R={components:{Swiper:S.Swiper,SwiperSlide:S.SwiperSlide,MainVisual:N},data(){return{swiperOption:{slidesPerView:1,spaceBetween:30,loop:!0,pagination:{clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},breakpoints:{1350:{slidesPerView:3},900:{slidesPerView:2}}},book:T}}},V=R,D=(0,c.Z)(V,y,O,!1,null,null,null),F=D.exports,M=function(){var t=this,n=t._self._c;return n("article",[n("SubVisual"),n("h3",[t._v("가까운 책방을 검색해보세요!")]),n("div",{staticClass:"searchBox"},[n("input",{directives:[{name:"model",rawName:"v-model",value:t.search,expression:"search"}],attrs:{type:"text",placeholder:"경기도"},domProps:{value:t.search},on:{keyup:t.Bsearch,input:function(n){n.target.composing||(t.search=n.target.value)}}}),n("button",{on:{click:t.Bsearch}},[t._v("검색")])]),n("ul",{staticClass:"list"},t._l(t.realbook,(function(e,s){return n("li",{key:s},[n("dl",[n("dt",[n("span",[t._v(t._s(s+1)+".")]),t._v("서점명 : "+t._s(e.FCLTY_NM))]),n("dd",[t._v("주소 : "+t._s(e.FCLTY_ROAD_NM_ADDR))]),n("dd",[t._v("전화번호 : "+t._s(e.TEL_NO||"전화번호없음"))])])])})),0)],1)},E=[],I=function(){var t=this;t._self._c;return t._m(0)},U=[function(){var t=this,n=t._self._c;return n("div",{staticClass:"sub_main"},[n("img",{attrs:{src:e(723),alt:""}}),n("h2",[t._v("책방검색")])])}],B={},Y=B,q=(0,c.Z)(Y,I,U,!1,null,null,null),$=q.exports,H={components:{SubVisual:$},data:function(){return{bookList:[],realbook:[],search:""}},created:function(){this.getList()},methods:{getList:function(){var t="http://api.kcisa.kr/API_CNV_045/request",n="?"+encodeURIComponent("serviceKey")+"=24a2c4de-6440-457e-9336-55fe524ea28d";n+="&"+encodeURIComponent("numOfRows")+"="+encodeURIComponent("432"),n+="&"+encodeURIComponent("pageNo")+"="+encodeURIComponent("1"),this.$axios.get(t+n).then((e=>{console.log(t+n),console.log(e),this.bookList=e.data.response.body.items.item,this.realbook=this.bookList})).catch((t=>{console.log(t)}))},Bsearch:function(){let t=this.search;this.realbook=t?this.bookList.filter((function(n){return n.FCLTY_ROAD_NM_ADDR.includes(t)})):this.bookList}}},J=H,K=(0,c.Z)(J,M,E,!1,null,null,null),z=K.exports,G=function(){var t=this,n=t._self._c;return n("article",[n("SubVisual2"),n("h3",[t._v("책크방에서 추천드리는 추천도서입니다.")]),n("ul",{staticClass:"BookList"},t._l(t.List,(function(s,r){return n("li",{key:r},[n("img",{attrs:{src:e(421)("./list-"+(r+1)+".png")}}),n("dl",[n("dt",[t._v(t._s(s.dt))]),n("dd",[n("span",[t._v(t._s(s.span))]),t._v(t._s(s.dd))])])])})),0)],1)},Q=[],W=function(){var t=this;t._self._c;return t._m(0)},X=[function(){var t=this,n=t._self._c;return n("div",{staticClass:"sub_main"},[n("img",{attrs:{src:e(388),alt:""}}),n("h2",[t._v("추천도서")])])}],tt={},nt=tt,et=(0,c.Z)(nt,W,X,!1,null,null,null),st=et.exports,rt={components:{SubVisual2:st},data(){return{List:T}}},it=rt,ot=(0,c.Z)(it,G,Q,!1,null,null,null),at=ot.exports;s["default"].use(C.ZP);var lt=new C.ZP({mode:"history",base:"/vue/",routes:[{path:"/",component:F},{path:"/main",component:F},{path:"/sub1",component:z},{path:"/sub2",component:at}]}),ut=e(594);s["default"].config.productionTip=!1,s["default"].prototype.$axios=ut.Z,new s["default"]({router:lt,render:t=>t(w)}).$mount("#app")},421:function(t,n,e){var s={"./list-1.png":409,"./list-10.png":794,"./list-2.png":77,"./list-3.png":607,"./list-4.png":363,"./list-5.png":710,"./list-6.png":255,"./list-7.png":635,"./list-8.png":720,"./list-9.png":205};function r(t){var n=i(t);return e(n)}function i(t){if(!e.o(s,t)){var n=new Error("Cannot find module '"+t+"'");throw n.code="MODULE_NOT_FOUND",n}return s[t]}r.keys=function(){return Object.keys(s)},r.resolve=i,t.exports=r,r.id=421},648:function(t,n,e){"use strict";t.exports=e.p+"img/back.f06a5b19.jpg"},409:function(t,n,e){"use strict";t.exports=e.p+"img/list-1.faa34053.png"},794:function(t,n,e){"use strict";t.exports=e.p+"img/list-10.d9a49ef3.png"},77:function(t,n,e){"use strict";t.exports=e.p+"img/list-2.8807d01a.png"},607:function(t,n,e){"use strict";t.exports=e.p+"img/list-3.cfaa3eaa.png"},363:function(t,n,e){"use strict";t.exports=e.p+"img/list-4.96f02e33.png"},710:function(t,n,e){"use strict";t.exports=e.p+"img/list-5.0a063d89.png"},255:function(t,n,e){"use strict";t.exports=e.p+"img/list-6.52881093.png"},635:function(t,n,e){"use strict";t.exports=e.p+"img/list-7.a8db8ba9.png"},720:function(t,n,e){"use strict";t.exports=e.p+"img/list-8.b90fe9f4.png"},205:function(t,n,e){"use strict";t.exports=e.p+"img/list-9.089d3ad6.png"},948:function(t,n,e){"use strict";t.exports=e.p+"img/main-content-1.0fb7f63d.png"},388:function(t,n,e){"use strict";t.exports=e.p+"img/search.2a72f48d.jpg"},723:function(t,n,e){"use strict";t.exports=e.p+"img/sub_visual.8987c2ca.jpg"}},n={};function e(s){var r=n[s];if(void 0!==r)return r.exports;var i=n[s]={exports:{}};return t[s].call(i.exports,i,i.exports,e),i.exports}e.m=t,function(){var t=[];e.O=function(n,s,r,i){if(!s){var o=1/0;for(c=0;c<t.length;c++){s=t[c][0],r=t[c][1],i=t[c][2];for(var a=!0,l=0;l<s.length;l++)(!1&i||o>=i)&&Object.keys(e.O).every((function(t){return e.O[t](s[l])}))?s.splice(l--,1):(a=!1,i<o&&(o=i));if(a){t.splice(c--,1);var u=r();void 0!==u&&(n=u)}}return n}i=i||0;for(var c=t.length;c>0&&t[c-1][2]>i;c--)t[c]=t[c-1];t[c]=[s,r,i]}}(),function(){e.d=function(t,n){for(var s in n)e.o(n,s)&&!e.o(t,s)&&Object.defineProperty(t,s,{enumerable:!0,get:n[s]})}}(),function(){e.g=function(){if("object"===typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(t){if("object"===typeof window)return window}}()}(),function(){e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)}}(),function(){e.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})}}(),function(){e.p="/vue/"}(),function(){var t={143:0};e.O.j=function(n){return 0===t[n]};var n=function(n,s){var r,i,o=s[0],a=s[1],l=s[2],u=0;if(o.some((function(n){return 0!==t[n]}))){for(r in a)e.o(a,r)&&(e.m[r]=a[r]);if(l)var c=l(e)}for(n&&n(s);u<o.length;u++)i=o[u],e.o(t,i)&&t[i]&&t[i][0](),t[i]=0;return e.O(c)},s=self["webpackChunkproject1"]=self["webpackChunkproject1"]||[];s.forEach(n.bind(null,0)),s.push=n.bind(null,s.push.bind(s))}();var s=e.O(void 0,[998],(function(){return e(268)}));s=e.O(s)})();
//# sourceMappingURL=app.9f419639.js.map