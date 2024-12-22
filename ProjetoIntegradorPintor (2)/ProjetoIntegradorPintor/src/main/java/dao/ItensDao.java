package dao;

import model.Itens;

import javax.persistence.EntityManager;
import java.util.List;

public class ItensDao {
    private static EntityManager em;

    public ItensDao (EntityManager em) {
        this.em = em;
    }

    public void cadastrar (Itens itens) {
        this.em.persist(itens);
    }
    public List<Itens> buscarTodos () {
        String jpql = "SELECT u FROM Itens u";
        return em.createQuery(jpql, Itens.class).getResultList();
    }
    public static Itens buscarPorId(int id) {
        return em.find(Itens.class,id);
    }
    public void excluir (Itens itens) {
        em.merge(itens);
        this.em.remove(itens);
    }
    public static void alterar(Itens itens) {
        em.merge(itens);
    }
}
