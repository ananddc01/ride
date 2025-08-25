import Course from './Course'
import html from './assets/a1.png'
import css from './assets/c1.jpg'
import js from './assets/b2.png'
import act from './assets/d1.jpg'


function CourseList() {

    const courses=[
    {
        id:1,
        name:"HTML" ,
        price:199 ,
        image:html,
        rating:4 
    },
    {
        id:2,
        name:"css" ,
        price:299 ,
        image:css,
        rating:4
    },
    {
        id:3,
        name:"JAVASCRIPT" ,
        price:499 ,
        image:js,
        rating:5 
    },
    {
        id:4,
        name:"react" ,
        price:599 ,
        image:act,
        rating:10 
    }
    ]

    courses.sort((x,y) => y.price - x.price) // decending order

    //const vfmCourse = courses.filter((courses) => courses.price<500)  // filtering 

    const coursesList=courses.map((course,index)=>                                // index=[0,1,2,4]     or course.id=[1,2,3,4] (key has a Unique value in All Cards)
    <Course
    key={index}
     name={course.name}
     image={course.image} 
     price={course.price} 
     rating={course.rating}
     />)
  
    return (
        <>
        {coursesList}
        </>

     );
}

export default CourseList