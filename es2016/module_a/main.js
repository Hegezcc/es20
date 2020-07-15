Vue.component('vticket', {
    template: `
<div class="ticket-container">
    <div class="inputs">
        <label class="name" :for="'name-' + type + i">
            <span>{{ type }} {{ i }}</span>
            <input type="text" v-model="name" :id="'name-' + type + i" placeholder="Name">
        </label>
        <label class="fastpass" :for="'fastpass-' + type + i">
            <input type="checkbox" :id="'fastpass-' + type + i" v-model="fastpass">
            <span> + Fast Pass >></span>
        </label>
    </div>
    <div class="ticket" :style="{ backgroundImage: ticketImg }">
        <p>{{ name }}</p>
    </div>
</div>`,
    props: ['type', 'i'],
    data() {return {
        name: null,
        fastpass: false,
    }},
    computed: {
        ticketImg() {
            if (this.fastpass) {
                return 'url("photos/Funny Island Ticket FP-2x.png")';
            } else {
                return 'url("photos/Funny Island Ticket-2x.png")';
            }
        }
    }
})

const app = new Vue({
    el: '#app',
    data: {
        currentTab: 'promotion',
        tickets: {
            Child: 2,
            Adult: 1,
            Senior: 0,
        },
        stockValue: '$93.85',
        activeCity: null,
        careers: [],
        gemState: 0,
        discount: null,
    },
    mounted() {
        this.discount = localStorage.getItem('funny-island-discount');

        if (this.discount) {
            this.gemState = 3;
        }

        this.updateStock();
        setInterval(this.updateStock, 5000);

        fetch('/career.php').then(d => d.json()).then(d => this.careers = d);
    },
    methods: {
        async updateStock() {
            this.stockValue = await fetch('/stock.php').then(d => d.text())
        },
        cityHover(name) {
            this.activeCity = name;
        },
        resetHover() {
            this.activeCity = null;
        },
        gemClick() {
            if (this.gemState < 3) {
                this.gemState++;

                if (this.gemState === 3) {
                    // Create discount
                    const randoms = '1234567890QWERTYUIOPASDFGHJKLZXCVBNM';
                    let str = '';

                    for (let i = 0; i < 4; i++) {
                        str += randoms[Math.floor(Math.random() * randoms.length)];
                    }

                    this.discount = str;

                    localStorage.setItem('funny-island-discount', str);
                }
            }
        },
        checkout() {
            const data = [];

            for (let el of this.$children) {
                data.push({
                    name: el.$data.name,
                    fastpass: el.$data.fastpass,
                    type: el.type,
                });
            }

            fetch('form-handler.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(data),
            }).then(() => document.location = 'form-handler.php');
        }
    }
})