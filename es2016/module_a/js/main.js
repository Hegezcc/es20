Vue.component('v-ticket', {
    template: `
<div class="ticket">
    <input type="hidden" :name="'ticket[' + i.id + '][type]'" :value="i.type">
    <div class="details">
        <label :for="'ticket-name-' + i.id">
            <span>{{ i.type }} {{ i.position }}</span>
            <input type="text" :name="'ticket[' + i.id + '][name]'" v-model="i.name" :id="'ticket-name-' + i.id">
        </label>
        <label :for="'ticket-fastpass-' + i.id">
            <input @input="$emit('fastpass')" type="checkbox" :name="'ticket[' + i.id + '][fastpass]'" v-model="i.fastpass" :id="'ticket-fastpass-' + i.id">
            <span>+ Fast Pass >></span>
        </label>
    </div>
    <div class="preview" :class="[ i.fastpass ? 'fastpass' : 'normal' ]">
        <div class="parts">
            <div class="start"></div>
            <div class="middle"></div>
            <div class="end"></div>
        </div>
        <p class="name">{{ i.name }}</p>
    </div>
</div>`,
    props: ['i'],
    data() {return {

    }},
    mounted() {
    }
})

const app = new Vue({
    el: "#app",
    data: {
        active: 'tickets',
        stock: {
            time: '???',
            price: '???',
        },
        city: null,
        careers: [],
        guestTypes: {
            Adult: 2,
            Children: 1,
            Senior: 0,
        },
        tickets: {
            Adult: [],
            Children: [],
            Senior: [],
        },
        currentId: 1,
        fastpassCount: 0,
        code: null,
        codeStorageKey: 'es2016-third-run-code',
        discountState: 0,
    },
    mounted() {
        this.updateTickets();
        this.getCareers();
        this.checkStock();

        const code = localStorage.getItem(this.codeStorageKey);

        if (code !== null) {
            this.code = code;
            this.discountState = 3;
        }

        setInterval(this.checkStock, 15000);
    },
    methods: {
        checkStock() {
            fetch('/stock.php').then(d => d.json()).then(d => Object.assign(this.stock, d));
        },
        getCareers() {
            fetch('/career.php').then(d => d.json()).then(d => this.careers = d);
        },
        updateTickets() {
            for (let type in this.guestTypes) {
                while (this.guestTypes[type] !== this.tickets[type].length) {
                    if (this.guestTypes[type] < this.tickets[type].length) {
                        this.tickets[type].pop();
                    } else {
                        this.tickets[type].push({
                            id: this.nextId(),
                            position: this.tickets[type].length + 1,
                            name: '',
                            fastpass: this.globalFastpass,
                            type,
                        });
                    }
                }
            }
        },
        nextId() {
            return this.currentId++;
        },
        discountClick() {
            if (this.discountState < 3) {
                this.discountState++;

                if (this.discountState === 3) {
                    // Calculate and persist code
                    const alphabet = "1234567890QWERTYUIOPASDFGHJKLZXCVBNM";
                    let code = '';

                    for (let i=0; i<4; i++) {
                        code += alphabet[Math.floor(Math.random()*alphabet.length)];
                    }

                    this.code = code;

                    localStorage.setItem(this.codeStorageKey, code);
                }
            }
        }
    },
    computed: {
        showTickets() {
            const arr = [];

            for (let type in this.tickets) {
                for (let ticket of this.tickets[type]) arr.push(ticket);
            }

            return arr;
        },
        globalFastpass() {
            return this.fastpassCount === 1;
        }
    },
    watch: {
        guestTypes: {
            deep: true,
            handler() {
                this.updateTickets();
            }
        },
        globalFastpass(val) {
            if (val) {
                for (let type in this.tickets) {
                    this.tickets[type].forEach(t => t.fastpass = true);
                }
            }
        }
    }
});