<?php

namespace Taller\Bundle\GageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Curso
 *
 * @ORM\Table(name="curso")
 * @ORM\Entity(repositoryClass="Taller\Bundle\GageBundle\Entity\CursoRepository")
 */
class Curso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    
    /**
    *@ORM\ManyToMany(targetEntity="Alumno", mappedBy="cursos") 
    * 
    */
    private $alumnos;

    
    /**
    *@ORM\ManyToOne(targetEntity="Materia", inversedBy="cursos", cascade={"persist"}) 
    *@ORM\JoinColumn(name="materia_id", referencedColumnName="id", nullable=false)
    * 
    */
    private $materia; 
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Curso
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alumnos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add alumnos
     *
     * @param \Taller\Bundle\GageBundle\Entity\Alumno $alumnos
     * @return Curso
     */
    public function addAlumno(\Taller\Bundle\GageBundle\Entity\Alumno $alumnos)
    {
        $this->alumnos[] = $alumnos;
    
        return $this;
    }

    /**
     * Remove alumnos
     *
     * @param \Taller\Bundle\GageBundle\Entity\Alumno $alumnos
     */
    public function removeAlumno(\Taller\Bundle\GageBundle\Entity\Alumno $alumnos)
    {
        $this->alumnos->removeElement($alumnos);
    }

    /**
     * Get alumnos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlumnos()
    {
        return $this->alumnos;
    }

    /**
     * Set materia
     *
     * @param \Taller\Bundle\GageBundle\Entity\Materia $materia
     * @return Curso
     */
    public function setMateria(\Taller\Bundle\GageBundle\Entity\Materia $materia)
    {
        $this->materia = $materia;
    
        return $this;
    }

    /**
     * Get materia
     *
     * @return \Taller\Bundle\GageBundle\Entity\Materia 
     */
    public function getMateria()
    {
        return $this->materia;
    }
    
    
         public function __toString()
    {
        return $this->getNombre();
    }
}