package dao;

import model.Marcas;

import javax.persistence.EntityManager;
import java.util.List;

public class MarcasDao {
    private static EntityManager em;

    public MarcasDao (EntityManager em){
        this.em = em;
    }

    public void cadastrar (Marcas marcas){
        this.em.persist(marcas);
    }

    public List<Marcas> buscarTodos(){
        String jpql = "SELECT c FROM Marcas c";
        return  em.createQuery(jpql,Marcas.class).getResultList();
    }

    public Marcas buscarPorId(int idMarcas){
        return em.find(Marcas.class,idMarcas);
    }

    public void excluir(Marcas marcas){
        em.merge(marcas);
        this.em.remove(marcas);
    }

    public void alterar (Marcas marcas){
        em.merge(marcas);
    }



}
