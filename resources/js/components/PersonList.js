import axios from 'axios'
import React, {Component} from 'react'
import {Link} from 'react-router-dom'

class PersonList extends Component {
    constructor() {
        super()
        this.state = {
            people: []
        }
    }

    componentDidMount() {
        axios.get('/api/v1/people').then(response => {
            this.setState({
                people: response.data.data
            })
        })
    }

    render() {
        const {people} = this.state
        return (
            <div className='container py-4'>
                <div className='row justify-content-center'>
                    <div className='col-md-8'>
                        <div className='card'>
                            <div className='card-header'>All people</div>
                            <div className='card-body'>
                                <Link className='btn btn-primary btn-sm mb-3' to='/create'>
                                    Create new person
                                </Link>
                                <ul className='list-group list-group-flush'>
                                    {people.map(person => (
                                        <Link
                                            className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                                            to={`/${person.id}`}
                                            key={person.id}
                                        >
                                            {person.name}
                                            <span className='badge badge-primary badge-pill'>
                                                {person.sex}
                                            </span>
                                        </Link>
                                    ))}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default PersonList