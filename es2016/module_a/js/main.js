Vue.component('vticket', {
    template: `
<div class="ticket-container">
    <div class="inputs">
        <label class="name" :for="'name-' + i.type + i.id">
            <span>{{ i.type }} {{ i.id }}</span>
            <input type="text" v-model="i.name" :id="'name-' + i.type + i.id" placeholder="Name">
        </label>
        <label class="fastpass" :for="'fastpass-' + i.type + i.id">
            <input type="checkbox" :id="'fastpass-' + i.type + i.id" v-model="i.fastpass" @click="$emit('fastpass')">
            <span> + Fast Pass >></span>
        </label>
    </div>
    <div class="ticket" :class="{ fastpass: i.fastpass }">
        <div class="start"></div>
        <div class="middle"></div>
        <div class="end"></div>
        <p>{{ i.name }}</p>
    </div>
</div>`,
    props: ['i'],
    data() {return {
    }}
})

const app = new Vue({
    el: '#app',
    data: {
        currentTab: 'tickets',
        ticketCounts: {
            Child: 2,
            Adult: 1,
            Senior: 0,
        },
        tickets: {
            Child: [{id: 1, name: '', fastpass: false, type: 'Child'}, {id: 2, name: '', fastpass: false, type: 'Child'}],
            Adult: [{id: 1, name: '', fastpass: false, type: 'Adult'}],
            Senior: [],
        },
        stockValue: 'loading...',
        activeCity: null,
        careers: [],
        gemState: 0,
        discount: null,
        fastpassState: 0,
    },
    created() {
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
            fetch('form-handler.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(this.tickets),
            }).then(() => document.location = 'form-handler.php');
        },
        checkFastpass() {
            this.fastpassState++;

            if (this.globalFastpass) {
                this.showTickets.forEach(t => t.fastpass = true);
            }
        }
    },
    watch: {
        ticketCounts: {
            deep: true,
            handler(val) {
                for (let key in val) {
                    const tickets = this.tickets[key];
                    while (val[key] !== tickets.length) {
                        if (val[key] < tickets.length) {
                            tickets.pop();
                        } else {
                            tickets.push({
                                id: tickets.length+1,
                                name: '',
                                type: key,
                                fastpass: this.globalFastpass
                            });
                        }
                    }
                }
            }
        }
    },
    computed: {
        showTickets() {
            const arr = [];

            for (let i in this.tickets) {
                for (let ticket of this.tickets[i]) {
                    arr.push(ticket);
                }
            }

            return arr;
        },
        globalFastpass() {
            return this.fastpassState === 1;
        }
    }
})